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
