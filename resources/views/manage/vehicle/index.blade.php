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
                    <div class="card-header" style="background-color: black; color:white">
                        {{ __('Vehicle Manager') }}
                        <a href="{{ route('manage.vehicle.create') }}">
                            <button class="btn btn-success btn-sm float-right">Add Vehicle</button>
                        </a>
                    </div>

                    <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">

                      @if ($isEmpty)
                            @if ($onSearch)
                                <div>No Vehicles found <br>
                                    <a href="{{ route('manage.vehicle.index') }}">
                                        <button type="button" class="btn btn-primary btn-sm">Back</button>
                                    </a>
                                </div>
                            @else
                                <div>No Vehicles found</div>
                            @endif
                        @else
                            <form class="d-flex" action="{{ route('manage.vehicle.index') }}" method="GET" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search by vehicle number"
                                    aria-label="Search" name="search-text" id="search-text">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
                            </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Vehicle Number</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Milage (Km)</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <th scope="row">{{ $data->id }}</th>
                                        <td>{{ $data->vehicle_number }}</td>
                                        <td>{{ $data->model }}</td>
                                        <td>{{ $data->milage }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td>{{ $data->type()->pluck('name')->implode(', ') }}</td>
                                        {{-- <td>{{ implode(',',$data->type()->get()->pluck('name')->toArray(),) }}</td> --}}
                                        <td>
                                            <form action="{{ route('manage.vehicle.destroy', $data) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection