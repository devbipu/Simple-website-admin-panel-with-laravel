<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Biplob Shaha</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/#service')}}">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/#courses')}}">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/#contact')}}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/adminarea')}}">Admin panel</a>
        </li>
      </ul>
      <div class="social_sec">
        {{-- <a href="https://facebook.com/devbipu" target="blank">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://github.com/devbipu" target="blank">
          <i class="bi bi-github"></i>
        </a> --}}
        @include('components.searchform')
      </div>
    </div>
  </div>
</nav>
