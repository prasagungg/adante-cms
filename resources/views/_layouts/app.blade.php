
<!DOCTYPE html>
<html>

<head>
    @include('_includes.head')
</head>

<body>
  <!-- Sidenav -->
  @include('_partials.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('_partials.navbar')
    <!-- Header -->
    <!-- Header -->
    @include('_partials.header')
    <!-- Page content -->
    <div class="container-fluid mt--6">
      @yield('content')
      <!-- Footer -->
      @include('_partials.footer')
    </div>
  </div>
 
  @include('_includes.foot')
</body>

</html>