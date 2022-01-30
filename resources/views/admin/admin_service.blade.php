@extends('admin.layout.app')

@section('admin-area-title', 'All Service')



@section('adminBodyContent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Service</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" onclick="" class="btn btn-sm btn-outline-secondary">Delete</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div> <!--header title end-->
    

    
    <div class="admin_service_wraper">
        <div class="add_btn my-3">
            <button id='serviceAddBtn' class="btn btn-info">Add Service</button>
        </div>
        <table id='service' class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Sl. NO</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="dataTBL d-none" id='service_tbl'>
                <!-- Data form custom.js -->
            </tbody>
            <tfoot>
               <tr>
                   <td colspan="5">
                        <div class="loader text-center">
                            <img src="{{asset('img/data-loader.gif')}}" style="width: 350px" alt="loader img">
                        </div>
                        <div class="nodata text-center d-none">
                            <h2 class="display-3">Data not found</h2>
                        </div>
                   </td>
               </tr>
            </tfoot>
        </table>
    </div>



    {{-- data not found --}}
    


  <!-- Modal for delete data -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to delete?</h2>
                    <p id="idShow"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" id="deleteOk" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit data -->
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to edit service?</h2>
                    <div class="">
                        <div class="form-group">
                            <label for="servTitle">Example label</label>
                            <input type="text" class="form-control" id="servTitle" placeholder="Service title">
                        </div>
                        <div class="form-group">
                            <label for="servDesc">Service Description</label>
                            <input type="text" class="form-control" id="servDesc" placeholder="Service Description">
                        </div>
                        <div class="form-group">
                            <label for="servImgLink">Service Image</label>
                            <input type="text" class="form-control" id="servImgLink" placeholder="Image link here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" id="editOk" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add data -->
    <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to add new service?</h2>
                    <div class="">
                        <div class="form-group">
                            <label for="servTitle">Service Title</label>
                            <input type="text" class="form-control" id="addServTitle" placeholder="Service title">
                        </div>
                        <div class="form-group">
                            <label for="servDesc">Service Description</label>
                            <input type="text" class="form-control" id="addServDesc" placeholder="Service Description">
                        </div>
                        <div class="form-group">
                            <label for="servImgLink">Service Image</label>
                            <input type="text" class="form-control" id="addServImgLink" placeholder="Image link here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" id="addOk" class="btn btn-sm btn-success">Add service</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Success Toast message --}}
    <div role="alert" style="position: absolute; top: 10px; right: 20px; padding: 4px 10px" aria-live="assertive" aria-atomic="true" class="toast toast_success bg-success" data-autohide="true">
        <div class="toast-body text-white">
          Success
        </div>
    </div>


    {{-- Faild Toast message --}}
    <div role="alert" style="position: absolute; top: 10px; right: 20px; padding: 4px 10px" aria-live="assertive" aria-atomic="true" class="toast toast_faild bg-danger" data-autohide="true">
        <div class="toast-body text-white">
          Faild
        </div>
    </div>
    
@endsection

{{-- script --}}

@section('admin-js')
  <script>
        /*===================================================
        --------declear axios function as helper start-------
        ===================================================*/


        function axiosGetCall(url) {
            /* It take url as paramiter and return axios response */
            var axiosRet = {};
            axios.get(url)
                .then(function(response) {
                    axiosRet = response;
                })
                .catch(function(error) {
                    axiosRet = error;
                })
            console.log(axiosRet);
        }

        function axiosPostCall(url, data) {
            /* It take 2 paramiter 1st url and secon json data and return axios response */
            var mydata = {};
            axios.post(url, data)
                .then(function(response) {
                    mydata = response;
                })
                .catch(function(error) {
                    return error;
                })
            return mydata;
        }

        // form clear method
        function clearForms(form){
            $('#'+form+' input').val('')
        }

        // button reset
        function btnReset(txt){
            // var btnReset = $('#deleteOk').html(txt);
            // return btnReset;
            return $('#deleteOk').html(txt);
        }

        let animation = "<div class='spinner-border' role='status'><span class='sr-only'>Loading...<pan></div>";
        /*===================================================
        -------declear axios function as helper end---------
        ===================================================*/




        // Show service data
        function serviceData() {
            var serviceLoader = $('.loader');
            var serviceDataWraper = $('.dataTBL')
            var serviceNoData = $('.nodata')


            axios.get('/allservice')
                .then(function(response) {
                    var servData = response.data;
                    
                    if (response.status == 200) {
                        // show loader
                        serviceLoader.addClass('d-none');
                        serviceDataWraper.removeClass('d-none');

                        // Inser data into font table form datatabase
                        $('#service').DataTable().destroy();
                        $('#service_tbl').empty();
                        $.each(servData, function(i, item) {

                            $('<tr>').html(
                                "<td>" + (i+1) + "</td>" +
                                "<td><img src='/" + servData[i].image + "' style='width: 100px;'></td>" +
                                "<td>" + servData[i].title + "</td>" +
                                "<td>" + servData[i].description + "</td>" +
                                "<td class='tbl_icons'><a data-id='" + servData[i].id + "' class='deleteBTN' ><i class='bi bi-trash'></i></a> <a class='servEditBtn' data-id='" + servData[i].id + "'><i class='bi bi-pencil-square'></i></a></td>"
                            ).appendTo('#service_tbl');

                        })

                        
                        
                        // Delete modal open button
                        $('.deleteBTN').click(function() {
                            var deleteid = $(this).data('id');
                            $('#deleteOk').attr('delete-id', deleteid);
                            $('#deleteConfirm').modal('show');
                        })

                        // Edit modal open button
                        $('.servEditBtn').click(function() {
                            var editid = $(this).data('id');
                            $('#editOk').attr('edit-id', editid);
                            $('#editData').modal('show');
                            existServiceData(editid);
                        })
                        // Edit change save btn
                        $('#editOk').click(function() {
                            var editId = $(this).attr('edit-id');
                            eidtService(editId)

                        })


                        $('#service').DataTable();
                        $('.dataTables_length').addClass('bs-select');
                    }


                    //console.log(response);
                })
                .catch(function(error) {
                    if (error) {
                        serviceLoader.addClass('d-none')
                        serviceDataWraper.addClass('d-none')
                        serviceNoData.removeClass('d-none')
                    }
                    // handle error
                    console.log(error);
                })
        }



        /*===================================================
                        -------Delete  start---------
        ===================================================*/

        // Delete Confirm button
        $('#deleteOk').click(function() {
            var deleteid = $(this).attr('delete-id');
            deleteService(deleteid)

        })
        //Delete service request
        function deleteService(deleteId) {
            
            btnReset(animation);

            var url = '/deleteservice';
            var data = {
                id: deleteId
            }
            axios.post(url, data)
                .then(function(response) {
                    btnReset('Yes');
                    if(response.status == 200){
                        if(response.data == 1) {
                            $('#deleteConfirm').modal('hide');
                            $('.toast_success').toast('show')
                            serviceData()
                            //console.log('Success')
                        } else {
                            //
                        }
                    }
                })
                .catch(function(error) {
                    btnReset('Faild');
                    setTimeout(function(){
                        $('#deleteOk').html("Try Again")
                    }, 3000);
                    $('.toast_faild').toast('show')
                    console.log(error);
                })

        }


        //Eidt service request
        function eidtService(eidtId){

            var title = $('#servTitle').val();
            var desc = $('#servDesc').val();
            var imglink =$('#servImgLink').val();

            $('#editOk').html(animation);
        
            var url = '/updateservice';
            var data = {
                id : eidtId,
                title : title,
                desc : desc,
                imgLink : imglink
            }

            if(title.length == 0 && desc.length == 0 && imglink.length == 0){
                $('#servTitle, #servDesc , #servImgLink').css('border-color', 'red');
                $('#servTitle, #servDesc , #servImgLink').focusout(function(){
                    $(this).css('border-color', 'inherit');
                })
                $('.toast_faild').toast('show');
            }else{
                axios.post(url, data)
                .then(function(response) {
                    $('#editOk').html("Save");
                    if (response.data == 1) {
                        $('#editData').modal('hide');
                        $('.toast_success').toast('show');
                        serviceData()
                        //console.log('Success')
                    }else {
                        $('#deleteConfirm').modal('hide');
                    }
                })
                .catch(function(error) {
                    $('#editOk').html("Try again");
                    setTimeout(function(){
                        $('#editOk').html("Yes")
                    }, 3000);
                    $('.toast_faild').toast('show')
                    console.log(error);
                })
            }
        }

        // get data into update form
        function existServiceData(servId){


            var url = '/getservicedata';
            var data = {
                id : servId
            }
            axios.post(url, data)
                .then(function(response) {
                    var datas = response.data;
                    if(response.status == 200){
                        // show db data into inputs
                        $('#servTitle').val(datas[0].title)
                        $('#servDesc').val(datas[0].description)
                        $('#servImgLink').val(datas[0].image);
                    }

                })
                .catch(function(error) {
                    console.log(error);
                })
        }



        // Add new service model open
        $('#serviceAddBtn').click(function() {
            $('#addData').modal('show');
        }) 

        // Add new save btn
        $('#addOk').click(function() {
            var title = $('#addServTitle').val();
            var desc = $('#addServDesc').val();
            var img = $('#addServImgLink').val();
            addService(title,desc,img);

        })

        // Service add function
        function addService(title,desc,img){
            $('#addOk').html(animation);
            var url = '/addnewservice';
            var data = {
                title   : title,
                desc    : desc,
                img     : img,
            }
            var titleData = $('#addServTitle').val();
            var descData = $('#addServDesc').val();
            var imglinkData =$('#addServImgLink').val();

            if(titleData.length == 0 && descData.length == 0 && imglinkData.length == 0){
                $('#addServTitle, #addServDesc , #addServImgLink').css('border-color', 'red');
                $('#addServTitle, #addServDesc , #addServImgLink').focusout(function(){
                    $(this).css('border-color', 'inherit');
                });
                $('#addOk').html("Try again");
                $('#addOk').css({
                    'background-color' : 'red',
                    'border-color' : 'red'
                })
                setTimeout(function(){
                    $('#addOk').html("Add Service");
                    $('#addOk').css({
                        'background-color' : '#28a745',
                        'border-color' : '#28a745',
                    })
                }, 3000);
            }else{
                axios.post(url, data)
                .then(function(response) {
                    $('#addOk').html("Add Service");
                    //var datas = response.data;
                    if(response.status == 200){
                        console.log(response);
                        $('#addData').modal('hide');
                        $('.toast_success').toast('show');
                        serviceData();
                        clearForms('addData')
                    }else{
                        //
                    }
                })
                .catch(function(error) {
                    $('#addOk').html("Try again");
                    setTimeout(function(){
                        $('#addOk').html("Add")
                    }, 3000);
                    $('.toast_faild').toast('show')
                    console.log(error);
                })
            }
            
        }
            serviceData()


    </script>    
@endsection