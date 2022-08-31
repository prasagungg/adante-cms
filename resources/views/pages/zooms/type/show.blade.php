@extends('_layouts.app')

@section('title', 'Projects')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('type.index') }}">Type Zoom</a></li>
<li class="breadcrumb-item active"><a href="{{ route('type.show', $type->id) }}">Show Type Zoom</a></li>
@endsection


@section('content')
<div class="row">
  <div class="col-12-6">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Detail Type Zoom</h3>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-4">Name</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->name }}</dd>
          <dt class="col-4">Host</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->host }}</dd>
          <dt class="col-4">Participants</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->participants }}</dd>
          <dt class="col-4">Price</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->price }}</dd>
          <dt class="col-4">Zoom Account</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->zooms->count() }}</dd>
          <dt class="col-4">Creator</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->creator->name }}</dd>
          <dt class="col-4">Created At</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($type->created_at)->format('d-m-Y') }}</dd>
          <dt class="col-4">Editor</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $type->editor->name }}</dd>
          <dt class="col-4">Last Update</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($type->updated_at)->format('d-m-Y') }}</dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="{{ route('type.edit', $type->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('type.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection