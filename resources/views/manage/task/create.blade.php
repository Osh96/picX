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
            <div class="col-md-9">
                <div class="card">
                  <div class="card-header" style="background-color: black; color:white">
                    {{ __('Package Manager') }}
                    
                </div>

                <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Weight (Kg)</th>
                                <th scope="col">Price (Rs)</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Telephone</th>
                                <th scope="col">Customer Address</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->weight }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->customer_name }}</td>
                                    <td>{{ $data->customer_phone }}</td>
                                    <td>{{ $data->customer_address }}</td>
                                    <td>
                                        <a href="{{ route('manage.package.edit', $data) }}">
                                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                        </a>
                                    </td>
                                    {{-- <td><a href="{{ route('manage.task.create', $data) }}">
                                        <button type="button" class="btn btn-primary btn-sm">Deliver</button>
                                        </a>
                                    </td> --}}
                                    {{-- <td>
                                    <form action="{{ route('manage.task.store', $data) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger">Deliver</button>
                                      </form>
                                    </td> --}}
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                    
                </div>
            

                    <div class="card-header" style="background-color: black; color:white">
                      {{ __('Vehicles') }}
                  </div>
                  <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Vehicle Number</th>
                                      <th scope="col">Model</th>
                                      <th scope="col">Milage (Km)</th>
                                      <th scope="col">Assign</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($datas as $data)
                                      <tr>
                                          <th scope="row">{{ $data->id }}</th>
                                          <td>{{ $data->vehicle_number }}</td>
                                          <td>{{ $data->model }}</td>
                                          <td>{{ $data->milage }}</td>
                                      
                                          <td>
                                              <form action="{{ route('manage.task.store', $data) }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-danger">Assign</button>
                                              </form> --}}
                                           </td>
                                      </tr>
                                      @endforeach
                                  
                              </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection