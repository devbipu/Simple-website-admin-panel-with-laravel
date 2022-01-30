@extends('admin.layout.app')

@section('admin-area-title', 'All Courses')


{{-- start body --}}

@section('adminBodyContent')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Courses</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" onclick="" class="btn btn-sm btn-outline-secondary">Show data</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div> <!--header title end-->


    <div class="admin_courses_wraper">
        <div class="add_btn my-3">
            <button id='courseAddBtn' class="btn btn-info">Add Course</button>
        </div>
        <table id='courses' class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Sl. NO</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="d-none" id='course_tbl'>
                <!-- Data form custom.js -->
            </tbody>
            <tfoot>
               <tr>
                   <td colspan="5">
                        <div class="courseLoader text-center">
                            <img src="{{asset('img/data-loader.gif')}}" style="width: 350px" alt="loader img">
                        </div>
                        <div class="noCoursedata text-center d-none">
                            <h2 class="display-3">Data not found</h2>
                        </div>
                   </td>
               </tr>
            </tfoot>
        </table>
    </div>

    {{-- Modals --}}

    <div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="">Do you want to delete the Course?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- <div class="modal-body">
              
            </div> --}}
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="deleteOk" class="btn btn-primary">Delete Course</button>
            </div>
          </div>
        </div>
    </div>


    <!-- Modal for edit data -->
    <div class="modal fade" id="editCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to edit Course?</h2>
                    <div class="">
                        <div class="form-group">
                            <label for="editCourseTitle">Course Title</label>
                            <input type="text" class="form-control" id="editCourseTitle" placeholder="Course title">
                        </div>
                        <div class="form-group">
                            <label for="editCourseDesc">Course Description</label>
                            <input type="text" class="form-control" id="editCourseDesc" placeholder="Course Description">
                        </div>
                        <div class="form-group">
                            <label for="servImgLink">Course Image</label>
                            <input type="text" class="form-control" id="editCourseImgLink" placeholder="Image link here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" id="editCourseOk" class="btn btn-sm btn-success">Update Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for add data -->
    <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to add Course?</h2>
                    <div class="">
                        <div class="form-group">
                            <label for="addCourseTitle">Course Title</label>
                            <input type="text" class="form-control" id="addCourseTitle" placeholder="Course title">
                        </div>
                        <div class="form-group">
                            <label for="addCourseDesc">Course Description</label>
                            <input type="text" class="form-control" id="addCourseDesc" placeholder="Course Description">
                        </div>
                        <div class="form-group">
                            <label for="servImgLink">Course Image</label>
                            <input type="text" class="form-control" id="addCourseImgLink" placeholder="Image link here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" id="addCourseOk" class="btn btn-sm btn-success">Update Course</button>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('admin-js')
    <script>
        courseShow()

        // Start courses js codes
        // form clear
        function clearCourseForms(form){
            $(form + ' input').val('');
        }

        // Show all Course form db
        function courseShow(){
            
            var url = '/getallcourses';
            axios.get(url)
                .then(function(response) {
                
                    var courseData = response.data;
                    if(response.status == 200){
                        $('.courseLoader').addClass('d-none');
                        $('#course_tbl').removeClass('d-none');    
                        $('#courses').DataTable().destroy();
                        $('#course_tbl').empty();
                        var count = 1;
                        $.each(courseData, function(i,item){
                            $('<tr>').html(
                                "<td>"+ count+"</td>" +
                                "<td><img style='width: 100px;' src='/"+ courseData[i].image+"'></td>" +
                                "<td>" + courseData[i].title+"</td>" +
                                "<td>" + courseData[i].description+"</td>" +
                                "<td class='tbl_icons'><a class='courseDeleteBTN' data-id='" + courseData[i].id+"'><i class='bi bi-trash'></i></a> <a data-id='" + courseData[i].id+"' class='courseEditBTN'><i class='bi bi-pencil-square'></i></a></td>"
                            ).appendTo('#course_tbl')
                            count ++;
                        })

                        //delete action
                        $('.courseDeleteBTN').click(function(){
                            $('#deleteCourseModal').modal('show');
                            let courseId = $(this).data('id');
                            $('#deleteOk').attr('course-id', courseId);
                        });

                        // Edit data
                        $('.courseEditBTN').click(function(){
                            $('#editCourse').modal('show');
                            let courseId = $(this).data('id');
                            $('#editCourseOk').attr('course-id', courseId);
                            allCourseAsId(courseId)
                        })

                        // Update query

                        $("#editCourseOk").click(function(){
                            let courseId = $(this).attr('course-id');
                            $('#editCourse').modal('hide');
                            updateCourse(courseId)
                        })

                        $('#courses').DataTable({'order' : false});
                        $('.dataTables_length').addClass('bs-select');
                    }else{
                        $('.courseLoader').addClass('d-none');
                        $('.noCoursedata').removeClass('d-none');
                    }
                })
                .catch(function(error) {
                    $('.courseLoader').addClass('d-none');
                    $('.noCoursedata').removeClass('d-none');
                    console.log(error);
                })
        }


        // Delete confirm Button
        $('#deleteOk').click(function(){
            let courseId = $(this).attr('course-id');
            $('#deleteCourseModal').modal('hide');
            deleteCourse(courseId);
            courseShow()
        })

        // Show Delete data by id
        function deleteCourse(courseId){

            axios.post('/delete_course', {id: courseId})
                .then(function(response){
                    console.log(response.status);
                })
                .catch(function(error) {
                    console.log(error);
                })
        }


        // Edit course id
        function courseEditBTN(courseId){
            axios.post('/edit_course', {id: courseId})
                .then(function(response){
                    console.log(response.status);
                })
                .catch(function(error) {
                    console.log(error);
                })
        }

        // Get all data into edit modal
        function allCourseAsId(courseId){
            
            axios.post('/edit_course', {id: courseId})
                .then(function(response){
                    if(response.status == 200){
                        $("#editCourseTitle").val(response.data[0].title);
                        $("#editCourseDesc").val(response.data[0].description);
                        $("#editCourseImgLink").val(response.data[0].image);
                        console.log(response.data);
                    }
                    //console.log(response.status);
                })
                .catch(function(error) {
                    console.log(error);
                })
        }

        //Update course 

        function updateCourse(courseId){
            let cTitle = $("#editCourseTitle").val();
            let cDesc = $("#editCourseDesc").val();
            let cImg = $("#editCourseImgLink").val();

            var data = {
                id      : courseId,
                title   : cTitle,
                desc    : cDesc,
                image   : cImg,
            }

            axios.post('/update_course', data)
            .then(function(response){
                console.log(response);
                clearCourseForms('#editCourse')
                courseShow()
            })
            .catch(function(error) {
                console.log(error);
            })
        }


        // Add new data
        // open add course modal
        $('#courseAddBtn').click(function(){
            $('#addCourse').modal('show');
            
        })

        $('#addCourseOk').click(function(){
            addNewCourse()
        })



        function addNewCourse(){
            let cTitle = $("#addCourseTitle").val();
            let cDesc = $("#addCourseDesc").val();
            let cImg = $("#addCourseImgLink").val();

            var data ={
                title: cTitle,
                desc: cDesc,
                image: cImg
            }

            axios.post('/add_course', data)
            .then(function(response){
                if(response.status == 200){    
                    $('#addCourse').modal('hide');
                    console.log(response.data);
                    clearCourseForms('#addCourse');
                    courseShow()
                }
            })
            .catch(function(error) {
                console.log(error);
            })
        }
    </script>
@endsection