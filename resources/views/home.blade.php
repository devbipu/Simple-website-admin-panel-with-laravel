@extends('layout.app')


@section('site-title', 'Home')

@section('content')
    {{-- banner --}}
    @include('components.homebanner')

    <!-- service section -->
    @include('components.home-services')
   
    <!-- Courses section -->
    @include('components.courses')
@endsection