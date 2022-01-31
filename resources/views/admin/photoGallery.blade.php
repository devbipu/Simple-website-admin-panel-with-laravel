@extends('admin.layout.app')

@section('admin-area-title', "Dashboard")

{{-- body start --}}
@section('adminBodyContent')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Photos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" onclick="showAllPhotoInGallery()"class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button> --}}
    </div>
  </div>


  <div class="">
      <button class="btn btn-primary" id="showPhotoForm">Add photo</button>
  </div>

    {{-- show image --}}
    <div class="photoGalleryWraper my-5 d-none">
        {{-- <div id="photoGalleryCont" class="row">
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
            <div class="col-md-3 my-3">
                <img src="http://localhost:8000/storage/SrpKwfFmj89qz3q9Nju3Wh9QdcIlmzXA4qt7MXbU.png" alt="" class="galleryPhoto">
            </div>
        </div> --}}
        <div id="photoGalleryCont" class="row"></div>
        
        <div class="text-center">
            <button class="btn btn-primary mt-5" id="loadMore">Load More</button>
        </div>

    </div>

    <div class="photoLoader text-center">
        <img src="{{asset('img/data-loader.gif')}}" style="width: 350px" alt="loader img">
    </div>
    {{-- No data div --}}
    <div class="nodata text-center d-none">
        <h2 class="display-3">No photo found</h2>
    </div>

  <!-- Modal for add data -->
    <div class="modal fade" id="addPhoto_from" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Do you want to add Photo?</h2>
                    <div class="form_wrap">
                        <div class="form-group">
                            <label for="addPhoto">Photo Title</label>
                            <input type="file" class="form-control" id="imgInput" required>
                        </div>
                    </div>
                    <div class="preview_wrap">
                        <img src="{{asset('/img/previewdefault.jpg')}}" alt="previewimg" id="previewUpload">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="savePhoto" class="btn btn-sm btn-success">Upload photo</button>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('admin-js')
    <script>
        showAllPhotoInGallery()
    </script>
@endsection