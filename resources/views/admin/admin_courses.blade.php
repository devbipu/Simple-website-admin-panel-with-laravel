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
            <tbody class="" id='course_tbl'>
                <!-- Data form custom.js -->
            </tbody>
            {{-- <tfoot>
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
            </tfoot> --}}
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
    </script>
@endsection