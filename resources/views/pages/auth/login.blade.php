@extends('_layouts.auth')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <div class="input-group input-group-merge input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
            </div>
            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email"
                name="email">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>
    </div>

    <div class="form-group">
        <div class="input-group input-group-merge input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password"
                name="password">

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id="remember" type="checkbox" name="remember">
        <label class="custom-control-label" for="remember">
            <span class="text-muted">Remember me</span>
        </label>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary my-4">Sign in</button>
    </div>
</form>
@endsection
