@extends('layouts.app')

@section('content')

<nav class="sidebar sidebar-offcanvas" style="margin-left: 30%; margin-bottom:3%;" id="sidebar">
      
    <ul class="nav">
      
      <li class="nav-item menu-items">
        @if (!Route::is('admin.users.*'))
        <a class="nav-link" href="{{ route('admin.users.index') }}">
          <span class="menu-title">Manage Users</span>
        </a>
        @endif
      </li>
      
      <li class="nav-item menu-items">
        @if (!Route::is('manage.package.*'))
        <a class="nav-link" href="{{ route('manage.package.index') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Package Management</span>
        </a>
        @endif
      </li>
      
      <li class="nav-item menu-items">
        @if (!Route::is('manage.vehicle.*'))
        <a class="nav-link" href="{{ route('manage.vehicle.index') }}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Vehicle Management</span>
        </a>
        @endif
      </li>
    </ul>
  </nav>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="background-color: black; color:white">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color: grey; color:white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Welcome -') }} {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
