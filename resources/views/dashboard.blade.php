@extends('_layouts.app')

@section('title', 'Dashboard')
    
@section('breadcrumb')
<li class="breadcrumb-item "><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
<li class="breadcrumb-item active "><a href="{{ route('home') }}">Dashboard</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <!-- Members list group card -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">Welcome</h5>
      </div>
      <!-- Card body -->
      <div class="card-body">
        <!-- List group -->
        All activities that you do in this area are your full responsibility. Please do it carefully and correctly
      </div>
    </div>
  </div>
</div>
@endsection