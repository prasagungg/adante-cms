@extends('_layouts.app')

@section('title', 'Projects')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item active "><a href="{{ route('project.index') }}">Project</a></li>
@endsection

@section('button')
    <a href="{{ route('project.create') }}" class="btn btn-sm btn-neutral">Create Project</a>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div id="alert"></div>
            @include('_partials.alert')
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">List Projects</h3>
            </div>

            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Creator</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    const ajaxUrl = '{{ route('project.datatables') }}'
    const deleteUrl = '{{ route('project.destroy', ':id') }}'
    const csrf = '{{ csrf_token() }}'

</script>
<script>
    $(function () {

        const table = $('table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: ajaxUrl,
                type: 'post',
                data: {
                    _token: csrf
                }
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'email'
                },
                {
                    data: 'password',

                },
                {
                    data: 'created_by',
                },
                {
                    data: 'created_at',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                },
            ]
        })

        const remove = id => {
            const url = deleteUrl.replace(':id', id)

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: csrf,
                    _method: 'DELETE'
                },
                success: res => {
                    $('#alert').html(`
					<div class="alert alert-success alert-dismissible fade show my-2 mx-2" role="alert">
                        <span class="alert-text">${res.message}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
				`)

                    table.ajax.reload()
                }
            })
        }


        $('tbody').on('click', '.delete', function () {
            if (confirm('Are you sure delete this project ?')) {
                const id = table.row($(this).parents('tr')).data().id

                remove(id)
            }
        })


    })

</script>
@endpush
