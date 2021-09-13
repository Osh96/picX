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
                    <div class="card-header" style="background-color: black; color:white">Edit Package
                        {{-- <span class="font-weight-bold">
                            {{ $data->name }}
                        </span> --}}
                        {{-- <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal"
                            data-target="#myModal">Remove</button> --}}
                    </div>

                    <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">
                        <form action="{{ route('manage.package.update', $data) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group col">
                            </div>
                    
                            <div class="form-group col">
                                <label for="name" class="col-md-6 col-form-label text-md-left">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $data->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="description" class="col-md-6 col-form-label text-md-left">Name</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description"
                                        value="{{ $data->description }}" required autocomplete="description" autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="price" class="col-md-6 col-form-label text-md-left">Price</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" class="form-control" name="price"
                                        value="{{ $data->price }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="weight" class="col-md-6 col-form-label text-md-left">Weight</label>
                                <div class="col-md-6">
                                    <input id="weight" type="number" step="0.01" class="form-control" name="weight"
                                        value="{{ $data->weight }}" required autofocus>
                                </div>
                            </div>

                            
                            <div class="form-group col">
                                <label for="customer_name" class="col-md-6 col-form-label text-md-left">Customer Name</label>
                                <div class="col-md-6">
                                    <input id="customer_name" type="text" step="0.01" class="form-control" name="customer_name"
                                        value="{{ $data->customer_name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="customer_phone" class="col-md-6 col-form-label text-md-left">Customer Phone</label>
                                <div class="col-md-6">
                                    <input id="customer_phone" type="text" step="0.01" class="form-control" name="customer_phone"
                                        value="{{ $data->customer_phone }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="customer_address" class="col-md-6 col-form-label text-md-left">Customer Address</label>
                                <div class="col-md-6">
                                    <input id="customer_address" type="text" step="0.01" class="form-control" name="customer_address"
                                        value="{{ $data->customer_address }}" required autofocus>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6 float-left">
                                <button type="submit" class="btn btn-primary ">Update Entry</button>
                            </div>
                            
                        </form>
                        <div>
                            <form action="{{ route('manage.package.destroy', $data) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style= "margin-left: 30%">Delete Entry</button>
                                </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection