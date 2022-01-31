@extends('layout.app')

@section('site-title', 'Login to Admin panel')



@section('content')
  <div class="container py-4" style="height:81vh;">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h2 class="display-4">Login to admin panel</h2>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <form action="" id="loginForm">
            <div class="form-group">
              <label for="username">Enter your username</label>
              <input type="text" name="username" value="" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" value="" class="form-control" id="password">
            </div>
            {{-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button type="submit" name="submit" class="btn btn-primary">Log in</button>
          </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
@endsection



@section('front-script')
    <script>

    // form submition
    $('#loginForm').on('submit',function(event){
      event.preventDefault();
      var datas = $(this).serializeArray();
      var username = datas[0]['value']
      var password = datas[1]['value']

      axios.post('/adminlogin',{user: username, pass: password})
      .then(function(response){
        if(response.status == 200 && response.data == 1){
          window.location.href = '/adminarea';
          console.log("Login Success")
        }else{
          window.location.href = '/';
          console.log("Login Faild")
        }
      })
      .catch(function(error){
        console.log(error);
      })
    })

    </script>
@endsection