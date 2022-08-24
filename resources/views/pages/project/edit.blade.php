@extends('_layouts.app')

@section('title', 'Create Project')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('project.index') }}">Project</a></li>
<li class="breadcrumb-item "><a href="{{ route('project.edit', $project->id) }}">Edit Project</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @include('_partials.alert')
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Projects</h3>
            </div>
            <form action="{{ route('project.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group @error('email') has-danger @enderror">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="name@example.com" required="" name="email"
                                            value="{{ $project->email }}">

                                        @error('email')
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
                                            value="{{ $project->password }}">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group  @error('description') has-danger @enderror">
                                        <textarea name="description"
                                            class="form-control @error('description') is-invalid @enderror" rows="2"
                                            required> {{ $project->description }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer py-4 d-flex justify-content-end">
                    <a href="{{ route('project.index') }}" class="btn btn-lg btn-neutral">Back</a>
                    <button type="submit" class="btn btn-lg btn-neutral">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
