@extends('_layouts.app')

@section('title', 'Projects')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
<li class="breadcrumb-item active"><a href="{{ route('project.show', $project->id) }}">Show Preject</a></li>
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
          <dd class="col-7">{{ $project->email }}</dd>
          <dt class="col-4">password</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $project->password }}</dd>
          <dt class="col-4">Description</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $project->description }}</dd>
          <dt class="col-4">Creator</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $project->creator->name }}</dd>
          <dt class="col-4">Created At</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($project->created_at)->format('d-m-Y') }}</dd>
          <dt class="col-4">Editor</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $project->editor->name }}</dd>
          <dt class="col-4">Last Update</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($project->updated_at)->format('d-m-Y') }} }}</dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection