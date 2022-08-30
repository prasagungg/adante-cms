@extends('_layouts.app')

@section('title', 'Create Project')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('type.index') }}">Type Zoom</a></li>
<li class="breadcrumb-item "><a href="{{ route('type.create') }}">Create Type Zoom</a></li>
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
          <h3 class="mb-0">Crate Type Zoom</h3>
        </div>
       <form action="{{ route('type.store') }}" method="POST">
        @csrf
         <div class="table-responsive">
           <table class="table align-items-center table-flush" id="table">
             <thead class="thead-light">
               <tr>
                 <th>Name</th>
                 <th>participants</th>
                 <th>host</th>
                 <th>price</th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
               <tr>
                
                 <td><input type="text" class="form-control" name="types[0][name]" placeholder="name" required></td>
                 <td><input type="text" class="form-control" name="types[0][participants]" placeholder="participants" required></td>
                 <td><input type="text" class="form-control" name="types[0][host]" placeholder="host" required></td>
                 <td><input type="text" class="form-control" name="types[0][price]" placeholder="price" required></td>
                 <td class="table-actions">
                  <a href="#!" id="add-row" class="table-action" data-toggle="tooltip" data-original-title="Add Type">
                    <i class="fas fa-plus"></i> 
                  </a>
                </td>
               </tr>
             </tbody>
           </table>
         </div>

        <div class="card-footer py-4 d-flex justify-content-end">
          <a href="{{ route('type.index') }}" class="btn btn-lg btn-neutral">Back</a>
          <button type="submit" class="btn btn-lg btn-neutral">Save</button>
        </div>

       </form>
      </div>
    </div>
</div>
@endsection

@push('js')
    <script>
      let i = 0;

      $("#add-row").click(function (){
        i++;
        $("#table").append(
          `
          <tr>
            <td><input type="text" class="form-control" name="types[${i}][name]" placeholder="name" required></td>
                 <td><input type="text" class="form-control" name="types[${i}][participants]" placeholder="participants" required></td>
                 <td><input type="text" class="form-control" name="types[${i}][host]" placeholder="host" required></td>
                 <td><input type="text" class="form-control" name="types[${i}][price]" placeholder="price" required></td>
            <td class="table-actions">
              <a href="#!" class="table-action table-action-delete remove-input-field" data-toggle="tooltip" data-original-title="Delete Project">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
            `
        )
      })

      $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
      });


    </script>
@endpush