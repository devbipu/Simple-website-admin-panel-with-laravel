@extends('admin.layout.app')

@section('admin-area-title', 'All Courses')


{{-- start body --}}

@section('adminBodyContent')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Courses</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" onclick="allContacts()" class="btn btn-sm btn-outline-secondary">Show data</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div> <!--header title end-->


    <div class="admin_contacts_wraper">
        <table id='contacts' class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>SL. NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="d-none" id='contact_tbl'>
                <!-- Data form custom.js -->
            </tbody>
            <tfoot>
               <tr>
                   <td colspan="5">
                        <div class="contactsLoder text-center">
                            <img src="{{asset('img/data-loader.gif')}}" style="width: 350px" alt="loader img">
                        </div>
                        <div class="noContdata text-center d-none">
                            <h2 class="display-3">Data not found</h2>
                        </div>
                   </td>
               </tr>
            </tfoot>
        </table>
    </div>

    {{-- Modals --}}

    <div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <button type="button" id="deleteContactOk" class="btn btn-primary">Delete Contact</button>
            </div>
          </div>
        </div>
    </div>



    
@endsection



@section('admin-js')
    <script>
        allContacts();
    </script>
@endsection