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
  <span class="alert-text">{{ session('success') }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif