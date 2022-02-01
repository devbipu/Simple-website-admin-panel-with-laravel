@extends('admin.layout.app')

@section('admin-area-title', "Dashboard")

{{-- body start --}}
@section('adminBodyContent')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>


  <div class="box_wrapper">
    <div class="row">
      <div class="col-md-2 summary_wrapper totalService">
        <p>Total Service</p>
        <h2>{{$totalService}}</h2>
      </div>
      <div class="col-md-2 summary_wrapper totalCourse">
        <p>Total Course</p>
        <h2>{{$totalCourse}}</h2>
      </div>
      <div class="col-md-2 summary_wrapper totalMessage">
        <p>Total Message</p>
        <h2>{{$totalContact}}</h2>
      </div>
      <div class="col-md-2 summary_wrapper totalPhoto">
        <p>Total Photo</p>
        <h2>{{$totalPhoto}}</h2>
      </div>
      <div class="col-md-2 summary_wrapper totalPhoto">
        <p>Total visitor</p>
        <h2>{{$totalVisitor}}</h2>
      </div>
    </div>
  </div> <!--main end-->
@endsection



@section('admin-js')
  <script>

    currentMenuItem('dashboard');
    //getTotal summery

    function totalAdminSummary(){

    }
  </script>
@endsection
