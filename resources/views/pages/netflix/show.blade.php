@extends('_layouts.app')

@section('title', 'Netflix Account')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('netflix.index') }}">Project</a></li>
<li class="breadcrumb-item active"><a href="{{ route('netflix.show', $netflix->id) }}">Show Preject</a></li>
@endsection


@section('content')
<div class="row">
  <div class="col-12-6">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Detail Project</h3>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-4">Email</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $netflix->project->email }}</dd>
          <dt class="col-4">password project</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $netflix->project->password }}</dd>
          <dt class="col-4">password netflix</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $netflix->password }}</dd>
          <dt class="col-4">price</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ 'Rp. ' . number_format($netflix->price, 0, ',', '.') }}</dd>
          <dt class="col-4">Creator</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $netflix->creator->name }}</dd>
          <dt class="col-4">Created At</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($netflix->created_at)->format('d-m-Y') }}</dd>
          <dt class="col-4">Editor</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $netflix->editor->name }}</dd>
          <dt class="col-4">Last Update</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($netflix->updated_at)->format('d-m-Y') }}</dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="{{ route('netflix.edit', $netflix->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('netflix.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection