@extends('_layouts.app')

@section('title', 'Create Project')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('project.index') }}">Project</a></li>
<li class="breadcrumb-item "><a href="{{ route('project.create') }}">Create Project</a></li>
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
          <h3 class="mb-0">Create Projects</h3>
        </div>
       <form action="{{ route('project.store') }}" method="POST">
        @csrf
         <div class="table-responsive">
           <table class="table align-items-center table-flush" id="table">
             <thead class="thead-light">
               <tr>
                 <th>Email</th>
                 <th>Password</th>
                 <th>Description</th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td><input type="email" class="form-control" name="projects[0][email]" placeholder="name@example.com" required></td>
                 <td><input type="text" class="form-control" name="projects[0][password]" placeholder="password" required></td>
                 <td><textarea name="projects[0][description]" class="form-control" rows="2" required></textarea></td>
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
          <a href="{{ route('project.index') }}" class="btn btn-lg btn-neutral">Back</a>
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
            <td><input type="email" class="form-control" name="projects[${i}][email]" placeholder="name@example.com" required></td>
            <td><input type="text" class="form-control" name="projects[${i}][password]" placeholder="password" required></td>
            <td><textarea name="projects[${i}][description]" class="form-control" rows="2" required></textarea></td>
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