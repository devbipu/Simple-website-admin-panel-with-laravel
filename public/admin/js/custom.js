    /** form clear method **/  
    function clearPhotoForms(form, element){
        $(form + ' input').val('');
        $(element).attr('src', '/img/previewdefault.jpg');
    }    

    /**Data loader animation**/ 
    var loaderCont = $('.photoLoader');
    var photoCont = $('.photoGalleryWraper');
    var noDataCont = $('.nodata');



    
    // function for get all contacts

        
    function allContacts(){

        axios.get('/getallcontacts')
            .then(function(response) {
                if(response.status == 200){
                    var allCont = response.data;
                    $('#contact_tbl').empty();
                    // show loader
                    $('.contactsLoder').addClass('d-none');
                    $('#contact_tbl').removeClass('d-none');

                    $.each(allCont, function(i,item){
                        $('<tr>').html(
                            "<td>" + allCont[i].id+ "</td>" +
                            "<td>" + allCont[i].name+ "</td>" +
                            "<td>" + allCont[i].email+ "</td>" +
                            "<td>" + allCont[i].phone+ "</td>" +
                            "<td>" + allCont[i].message+ "</td>" +
                            "<td class='tbl_icons'><a data-id='" + allCont[i].id + "' class='deleteContBTN' ><i class='bi bi-trash'></i></a></td>"
                        ).appendTo('#contact_tbl');
                    })
                    

                    // delete
                    $('.deleteContBTN').click(function(){
                        var id = $(this).data('id');
                        deleteContact(id);
                    })

                }else{
                    $('.contactsLoder').addClass('d-none');
                    $('.noContdata').removeClass('d-none');
                }
            })
            .catch(function(error) {
                $('.contactsLoder').addClass('d-none');
                $('.noContdata').removeClass('d-none');
                console.log(error);
            })
    }


    // delete contacts

    function deleteContact(contId){
        axios.post('/deletecontact', {id: contId})
            .then(function(response) {
                allContacts()
                console.log(response);
            })
            .catch(function(error) {
                return error;
            })
    }



    /*============== Gallery page =============*/
    
    // Open add image modal
    $('#showPhotoForm').click(function(){
        $('#addPhoto_from').modal('show');
    })

    $('#imgInput').change(function(){
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);

        reader.onload = function(event){
            var imgSourse = event.target.result;
            $('#previewUpload').attr('src', imgSourse);
        }

    })

    $('#savePhoto').click(function() {
        let loaderAnim = "<div class='spinner-border' role='status'><span class='sr-only'>Loading...<pan></div>";
        
        $(this).html(loaderAnim);
        var photo = $('#imgInput').prop('files')[0];
        var formData = new FormData;
        formData.append('photo', photo);

        axios.post('/uploadphoto', formData)
        .then(function(response){
            $('#savePhoto').html('Save');
            $('#addPhoto_from').modal('hide');
            if(response.status == 200){
                console.log(response);
                showAllPhotoInGallery()
                clearPhotoForms('#addPhoto_from', '#previewUpload')
            }
        })
        .catch(function(error){
            $('#savePhoto').html('Save');
            $('#addPhoto_from').modal('hide');
            console.log(error);
        })
    })

    

    // show all photo to view
    function showAllPhotoInGallery(){
        
        
        axios.get('/getallphotourl')
        .then(function(response){
            var photoUrl = response.data;
            if(response.data.length != 0){
                
                loaderCont.addClass('d-none');
                photoCont.removeClass('d-none');

                $('#photoGalleryCont').empty();
                $.each(photoUrl, function(i, item) {
                    $('<div class="col-md-3">').html(
                        "<div class='imgWraper text-center'><img src='"+ photoUrl[i].img_url +"' data-id='"+ photoUrl[i].id +"' alt='' class='galleryPhoto'></div>" +
                        "<button class='btn btn-sm btn-danger mb-3' id='photoDeletebtn' data-id='"+ photoUrl[i].id +"' photo-path='"+ photoUrl[i].img_url +"'>Delete</button>"
                    ).appendTo('#photoGalleryCont');
                })


                $('#photoDeletebtn').click(function(event){
                    event.preventDefault();
                    var photoId = $(this).data('id');
                    var photoPath = $(this).attr('photo-path');
                    //alert('ok');
                    photoDelete(photoId,photoPath);
                    
                })

            }else if(response.data.length == 0){
                loaderCont.addClass('d-none');
                noDataCont.removeClass('d-none');
            }
        })
        .catch(function(error){
            loaderCont.addClass('d-none');
            noDataCont.removeClass('d-none');
            console.log(error);
        })
    }



    function loadPhotoById(lastImgId, button){
        var reqImgId = lastImgId;
        button.html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...<pan></div>")
        axios.get('/getphotourlbyid/' + reqImgId)
        .then(function(response){
            var photoUrl = response.data;
            if(photoUrl.length != 0){
                button.html("Load More")
                $.each(photoUrl, function(i, item) {
                    $('<div class="col-md-3">').html(
                        "<div class='imgWraper text-center'><img src='"+ photoUrl[i].img_url +"' data-id='"+ photoUrl[i].id +"' alt='' class='galleryPhoto'></div>" +
                        "<button class='btn btn-sm btn-danger mb-3' id='photoDeletebtn' data-id='"+ photoUrl[i].id +"' photo-path='"+ photoUrl[i].img_url +"'>Delete</button>"
                    ).appendTo('#photoGalleryCont');
                })

                // $('#photoDeletebtn').click(function(){
                //     // var photoId = $(this).data('id');
                //     // var photoPath = $(this).attr('photo-path');
                //     alert('ok');
                //     //photoDelete(photoId,photoPath)
                // })
            }else{
                button.html("No More photo exist");
                button.addClass('btn-danger');
                $('<div class="col-md-12 mt-5">').html(
                    "<div class='text-center'><h2>No more photo exist to show</h2></div>"
                ).appendTo('#photoGalleryCont');
            }
        })
        .catch(function(error){
            button.html("No More photo exist");
            console.log(error);
        })
    }

    // load more
    $('#loadMore').click(function(){
        //var lastImgId = $(this).closest('div').find('img').data('id');
        var lastImgId = $("div#photoGalleryCont div:last-child .imgWraper img").data('id');
        var thisbtn = $(this);
        loadPhotoById(lastImgId, thisbtn)
    })


    
    // delete photo
    function photoDelete(photoId,photoPath){
        let fData = new FormData;
        fData.append('pPath', photoPath)
        fData.append('pid', photoId)

        axios.post('/deletegalleryphoto', fData)
        .then(function(response){
            showAllPhotoInGallery()
            console.log(response);
        })
        .catch(function(error){
            console.log(error);
        })
    }

    