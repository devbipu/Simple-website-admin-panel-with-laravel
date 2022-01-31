{{-- Home services sec --}}

<div class="service_wraper" id="service">
  <div class="container py-5">
    <h2 class="text-center display-3">What I do</h2>
    <div class="row justify-contnet-center">
      @foreach ($serviceData as $Sdata)
        <div class="col col-sm-6 col-md-4 col-xl-3 my-3 my-md-3">
          <div class="sc_wrap">
            <div class="card" style="">
              <img src="{{$Sdata->image}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$Sdata->title}}</h5>
                <p class="card-text">{{$Sdata->description}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach <!--end column-->
    </div>
  </div>
</div>