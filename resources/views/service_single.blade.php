@extends('layout.app')


@section('site-title', "$data->title")

@section('content')
    <div class="container my-5" style="height: 100vh">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card mb-3" style="">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('')}}/img/service-banner.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{$data->title}}</h5>
                        <p class="card-text">{{$data->description}}</p>
                        </div>
                    </div>
                    </div>
              </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="text-center">
            <a href="{{ url()->previous() }}" class="btn btn-info">Go Back</a>
        </div>
    </div>

@endsection

