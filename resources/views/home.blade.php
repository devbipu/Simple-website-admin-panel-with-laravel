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

      $('.searchInp').keyup(function(){
        var datas = $(this).val();
        if(datas != ""){
          onsearch(datas);
          $(".searchRes").addClass('showResultDiv')
        }else{
          $('#searchResList').empty();
          $(".searchRes").removeClass('showResultDiv')
          console.log("Please input data")
        }
      })
      function onsearch(data){
        axios.post('/searchservice', {data: data})
        .then(function(response){
          if(response.status == 200){
              var da = response.data;
              $('#searchResList').empty();
            $.each(da,function(i){
              $('#searchResList').append("<li>"+ da[i].title +"</li>");
                console.log(da[i].title);
            })
          }
        })
      }


    </script>
@endsection