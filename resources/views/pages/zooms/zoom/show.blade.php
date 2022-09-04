@extends('_layouts.app')

@section('title', 'Netflix Account')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('zoom.index') }}">Zoom</a></li>
<li class="breadcrumb-item active"><a href="{{ route('zoom.show', $zoom->id) }}">Show Zoom</a></li>
@endsection


@section('content')
<div class="row">
  <div class="col-12-6">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Detail Zoom</h3>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-4">Email</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->project->email }}</dd>
          <dt class="col-4">password project</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->project->password }}</dd>
          <dt class="col-4">password zoom</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->password }}</dd>
          <dt class="col-4">Price</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ 'Rp. ' . number_format($zoom->type->price, 0, ',', '.') }}</dd>
          <dt class="col-4">Host</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->type->host }}</dd>
          <dt class="col-4">Participants</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->type->participants }}</dd>
          <dt class="col-4">Country</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->country }}</dd>
          <dt class="col-4">Creator</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->creator->name }}</dd>
          <dt class="col-4">Created At</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($zoom->created_at)->format('d-m-Y') }}</dd>
          <dt class="col-4">Editor</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ $zoom->editor->name }}</dd>
          <dt class="col-4">Last Update</dt>
          <dd class="col-1">:</dd>
          <dd class="col-7">{{ \Carbon\Carbon::parse($zoom->updated_at)->format('d-m-Y') }}</dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="{{ route('zoom.edit', $zoom->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('zoom.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection