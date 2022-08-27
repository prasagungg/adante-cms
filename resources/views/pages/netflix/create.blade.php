@extends('_layouts.app')

@section('title', 'Netflix Account')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('netflix.index') }}">Netflix</a></li>
<li class="breadcrumb-item "><a href="{{ route('netflix.create') }}">Create Netflix Account</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show my-2 mx-2" role="alert">
            <ul class="p-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Create Account Netflix</h3>
        </div>
       <form action="{{ route('netflix.store') }}" method="POST">
        @csrf
         <div class="table-responsive">
           <table class="table align-items-center table-flush" id="table">
             <thead class="thead-light">
               <tr>
                 <th>Project</th>
                 <th>Password</th>
                 <th>Price</th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td><select name="netflix[0][project_id]" class="form-control select2"></select></td>
                 <td><input type="text" class="form-control" name="netflix[0][password]" placeholder="password" required></td>
                 <td><input type="text" class="form-control price" name="netflix[0][price]" placeholder="price" required></td>
                 <td class="table-actions">
                  <a href="#!" id="add-row" class="table-action" data-toggle="tooltip" data-original-title="Add Project">
                    <i class="fas fa-plus"></i> 
                  </a>
                </td>
               </tr>
             </tbody>
           </table>
         </div>

        <div class="card-footer py-4 d-flex justify-content-end">
          <a href="{{ route('netflix.index') }}" class="btn btn-lg btn-neutral">Back</a>
          <button type="submit" class="btn btn-lg btn-neutral">Save</button>
        </div>

       </form>
      </div>
    </div>
</div>
@endsection

@push('select2')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
  <style>
    .select2 {
        width: 100% !important;
    }
    .rowComponent td{
            padding: 0px 8px 16px 0 !important
    }
    .rowHead td{
        padding: 0px 8px 16px 0 !important
    }
    .rowComponent td .form-control{
        border-radius:0px !important;
    }

</style>
@endpush

@push('js')
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script>
      let i = 0;
      const csrf = '{{ csrf_token() }}'

      $("#add-row").click(function (){
        i++;
        $("#table").append(
          `
          <tr>
            <td><select name="netflix[${i}][project_id]" class="form-control select2"></select></td>
            <td><input type="text" class="form-control" name="netflix[${i}][password]" placeholder="password" required></td>
            <td><input type="text" class="form-control price" name="netflix[${i}][price]" placeholder="price" required></td>
            <td class="table-actions">
              <a href="#!" class="table-action table-action-delete remove-input-field" data-toggle="tooltip" data-original-title="Delete Project">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
            `
        )
        
        $('.select2').select2({
          placeholder: '-- Select Project --',
          ajax: {
              url: '{{ route('project.select') }}',
              type: 'post',
              dataType: 'json',
              data: params => {
                  return {
                      _token: csrf,
                      search: params.term
                  }
              },
              error: (err) => {
                  console.log(err)
              },
              processResults: data => {
                  return {
                      results: data
                  }
              },
              cache: true,
          },
          allowClear: true
      })

      })

      $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
      });

      $('select[name="netflix['+i+'][project_id]"]').select2({
          placeholder: '-- Select Project --',
          ajax: {
              url: '{{ route('project.select') }}',
              type: 'post',
              dataType: 'json',
              data: params => {
                  return {
                      _token: csrf,
                      search: params.term
                  }
              },
              error: (err) => {
                  console.log(err)
              },
              processResults: data => {
                  return {
                      results: data
                  }
              },
              cache: true,
          },
          allowClear: true
      })


    </script>
@endpush