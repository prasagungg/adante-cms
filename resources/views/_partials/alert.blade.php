@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show my-2 mx-2" role="alert">
  <span class="alert-text">{{ session('error') }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show my-2 mx-2" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Success!</strong> This is a success alert—check it out!</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif