@extends('_layouts.app')

@section('title', 'Create Project')

@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item "><a href="{{ route('type.index') }}">Type Zoom</a></li>
<li class="breadcrumb-item "><a href="{{ route('type.edit', $type->id) }}">Edit Type Zoom</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @include('_partials.alert')
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Type Zoom Account</h3>
            </div>
            <form action="{{ route('type.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                              <th>Name</th>
                              <th>participants</th>
                              <th>host</th>
                              <th>price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group @error('name') has-danger @enderror">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="name@example.com" required="" name="name"
                                            value="{{ $type->name }}">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="form-group  @error('participants') has-danger @enderror">
                                        <input type="text" class="form-control @error('participants') is-invalid @enderror"
                                            placeholder="name@example.com" required="" name="participants"
                                            value="{{ $type->participants }}">
                                        @error('participants')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                  <div class="form-group  @error('host') has-danger @enderror">
                                      <input type="text" class="form-control @error('host') is-invalid @enderror"
                                          placeholder="name@example.com" required="" name="host"
                                          value="{{ $type->host }}">
                                      @error('host')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                      @enderror
                                  </div>
                              </td>

                              <td>
                                <div class="form-group  @error('price') has-danger @enderror">
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        placeholder="name@example.com" required="" name="price"
                                        value="{{ $type->price }}">
                                    @error('price')
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
                    <a href="{{ route('type.index') }}" class="btn btn-lg btn-neutral">Back</a>
                    <button type="submit" class="btn btn-lg btn-neutral">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
