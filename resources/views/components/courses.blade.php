{{-- <div class="container">
    <div class="card-group">
        <div class="card m-2">
          <img src="{{asset('img/courses-banner.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <button class="btn bg-primary text-white px-4">Start</button>
          </div>
        </div>
        <div class="card m-2">
          <img src="{{asset('img/courses-banner.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <button class="btn bg-primary text-white px-4">Start</button>
          </div>
        </div>
        <div class="card m-2">
          <img src="{{asset('img/courses-banner.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <button class="btn bg-primary text-white px-4">Start</button>
          </div>
        </div>
        <div class="card m-2">
          <img src="{{asset('img/courses-banner.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <button class="btn bg-primary text-white px-4">Start</button>
          </div>
        </div>
    </div>
</div> --}}

<div class="courses_wraper" id="courses">
    <div class="container py-5">
      <h2 class="text-center display-3">My All Courses</h2>
      <div class="row justify-contnet-center">
        @foreach ($coursesData as $Sdata)
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