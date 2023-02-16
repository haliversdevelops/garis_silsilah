<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/nice-select.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}">
  

</head>
<body>
<div class="main-wrapper">
  <div class="sidebar-wrapper">   
    <div class="sidebar-logo">
      <a href="{{ route('admin.dashboard') }}" class="navbar-brand">garis_silsilah</a> 
    </div>
    <div class="sidebar-profile">
      <div class="profile-img">
        <img src="{{ asset('images/profile/user.svg') }}" class="img-rounded-circle" width="50">
      </div>
      <div class="profile-info">
        <h6 class="username">Ridho Adha</h6>
        <h6 class="level">Admin</h6>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->path() == 'admin' || request()->path() == 'admin' ? 'active' : ''}}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="ion ion-md-pie"></i> Dashboard</a>
        </li>
        <li class="nav-item {{ request()->path() == 'admin/user' || request()->path() == 'admin/user' ? 'active' : ''}}">
          <a href="{{ route('admin.user.index') }}" class="nav-link">User</a>
        </li>

       
      </ul>
    </div>
  </div>
  <div class="main-content">
    <div class="main-header">
      <nav class="navbar navbar-expand-md">
        <button class="btn btn-default text-black" id="menu-toggle"><i class="ti-menu"></i></button>
        
        <ul class="navbar-nav navbar-widget">
            <li class="nav-item"><a href="" class="nav-link"><i class="ti-email"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="ti-bell"></i></a></li>
            <li class="nav-item dropdown">
              <a href="" class="nav-link" data-toggle="dropdown"><i class="ti-settings"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
              <a href="" class="dropdown-item">Keluar</a> 
              </div>
            </li>
          </ul> 
      </nav>
    </div>    
    <div class="main-body">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <ol class="breadcrumb p-0">
              <li class="breadcrumb breadcrumb-item mb-0 pl-0 pr-0">@yield('main-title')</li>
              <li class="breadcrumb breadcrumb-item active mb-0">@yield('sub-title')</li>
          </ol>
        </div>
        <div>
          @yield('cta')
        </div>
      </div>
      <div class="table-area bg-white">
        @yield('content')
      </div>
    </div>
    
  </div>

</div>
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/jquery.fileuploader.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('js/jquery.nice-select.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
</body>  
</html>