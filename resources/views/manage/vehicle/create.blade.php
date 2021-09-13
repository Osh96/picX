@extends('layouts.app')

@section('content')
<nav class="sidebar sidebar-offcanvas" style="margin-left: 30%; margin-bottom:3%;" id="sidebar">
      
    <ul class="nav">
      
      
      <li class="nav-item menu-items">
        @if (!Route::is('admin.users.*'))
        <a class="nav-link" href="{{ route('admin.users.index') }}">
          {{-- <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span> --}}
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
                <div class="card-header" style="background-color: black; color:white">Add New Vehicle</div>

                <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">
                    <form action="{{ route('manage.vehicle.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col">
                            <label for="vehicle_number" class="col-md-6 col-form-label text-md-left">Vehicle Number<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="vehicle_number" type="number" step="0.01" class="form-control" name="vehicle_number" min=0
                                    value="{{ ('vehicle_number') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="model" class="col-md-6 col-form-label text-md-left">Model<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="model" type="text" step="0.01" class="form-control" name="model" min=0
                                    value="{{ ('') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="milage" class="col-md-6 col-form-label text-md-left">Milage (Km)<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="milage" type="number" step="0.01" class="form-control" name="milage" min=0
                                    value="{{ ('milage') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="type" class="col-md-6 col-form-label text-md-left">Type<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="custom-select" @error('type')
                                    is-invalid @enderror">
                                    <option value="">Select One</option>
                                    @foreach ($data as $type)
                                        <option {{ old('type') == $type->id ? 'selected' : '' }}
                                            value="{{ $type->id }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="form-group col">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection