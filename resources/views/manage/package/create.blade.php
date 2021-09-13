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
                <div class="card-header" style="background-color: black; color:white">Add New Package</div>

                <div class="card-body"style="background-color: rgb(172, 172, 172); color:white">
                    <form action="{{ route('manage.package.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col">
                            <label for="email" class="col-md-6 col-form-label text-md-left">Name<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" autofocus @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="description" class="col-md-6 col-form-label text-md-left">Describe</label>
                            <div class="col-md-6 contenteditable=" true">
                                <textarea id="description" class="form-control" name="description"
                                    value="{{ old('description') }}" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="price" class="col-md-6 col-form-label text-md-left">Price (Rs)<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control" name="price" min=0
                                    value="{{ old('price') }}" required autofocus @error('price') is-invalid @enderror">
                                    @error('price')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="weight" class="col-md-6 col-form-label text-md-left">Weight (Kg)<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="weight" type="number" step="0.01" class="form-control" name="weight" min=0
                                    value="{{ old('weight') }}" required autofocus @error('weight') is-invalid @enderror">
                                    @error('weight')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="customer_name" class="col-md-6 col-form-label text-md-left">Customer Name<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="customer_name" type="text" step="0.01" class="form-control" name="customer_name" min=0
                                    value="{{ old('customer_name') }}" required autofocus @error('customer_name') is-invalid @enderror">
                                    @error('customer_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="customer_phone" class="col-md-6 col-form-label text-md-left">Customer Phone Number<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="customer_phone" type="number" step="0.01" class="form-control" name="customer_phone" min=0
                                    value="{{ old('customer_phone') }}" required autofocus @error('customer_phone') is-invalid @enderror">
                                    @error('customer_phone')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="customer_address" class="col-md-6 col-form-label text-md-left">Customer Address<span
                                    class="text-danger"> *</span></label>
                            <div class="col-md-6">
                                <input id="customer_address" type="text" step="0.01" class="form-control" name="customer_address" min=0
                                    value="{{ old('customer_address') }}" required autofocus @error('customer_address') is-invalid @enderror">
                                    @error('customer_address')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="form-group col">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Submit Package</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection