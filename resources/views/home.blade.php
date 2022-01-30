@extends('layout.app')


@section('site-title', 'Home')

@section('content')
    {{-- banner --}}
    @include('components.homebanner')

    <!-- service section -->
    @include('components.home-services')
   
    <!-- Courses section -->
    @include('components.courses')

    <!-- Contact section -->
    @include('components.contact')

@endsection





@section('front-script')
    <script>
        // $('#messageSend').click(function(){
        //     var name = $('#name');
        //     var email = $('#email');
        //     var phone = $('#phone');
        //     var message = $('#message').val();
        //     alert(name + email + phone + message)
        //     //contactMessage(name,email,phone,message)
        // })



    </script>
@endsection