<!DOCTYPE html>
<html>

<head>
  @include('_includes.head')
</head>

<body class="bg-default">
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9"></div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
     

      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text">{{ session('error') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @endif
              {{-- <div class="text-muted text-center mt-2 mb-3"><small>Login</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div> --}}
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              @yield('content')
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  @include('_includes.foot')
</body>

</html>