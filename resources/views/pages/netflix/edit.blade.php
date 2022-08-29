@extends('_layouts.app')

@section('title', 'Netflix Account')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('netflix.index') }}">Netflix</a></li>
<li class="breadcrumb-item "><a href="{{ route('netflix.edit', $netflix->id) }}">Edit Netflix Account</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
      
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Edit Account Netflix</h3>
        </div>
       <form action="{{ route('netflix.update', $netflix->id) }}" method="POST">
        @csrf
        @method("PUT")
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
                 <td>
                  <div class="form-group  @error('project_id') has-danger @enderror">
                    <select name="project_id" class="form-control select2 @error('project_id') is-invalid @enderror"></select>
                    @error('project_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </td>
                 <td>
                  <div class="form-group  @error('password') has-danger @enderror">
                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                        placeholder="name@example.com" required="" name="password"
                        value="{{ $netflix->password }}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </td>
                 <td> 
                  <div class="form-group  @error('price') has-danger @enderror">
                    <input type="text" class="form-control price @error('price') is-invalid @enderror"
                        placeholder="name@example.com" required="" name="price"
                        value="{{ $netflix->price }}">
                  @error('price')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div></td>
                
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
      const csrf = '{{ csrf_token() }}'
      const projectId = '{{ $netflix->project_id }}'
      const urlSelectedProject = '{{ route('project.selected', ':id' ) }}'
      
      $(document).ready(function (){
          $.ajax({
            type: 'get',
            url: urlSelectedProject.replace(':id', projectId),
            dataType: 'json',
            error: (err) => {
                console.log(err);
            },
            success: (data) => {
              let option = new Option(data.text, data.id, true, true)
              $('select[name="project_id"').append(option).trigger('change')
              $('select[name="project_id"').trigger({
                  type: 'select2:select',
                  params: {
                      data
                  }
              })
            }
          })
          
      })

      $('select[name="project_id"]').select2({
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