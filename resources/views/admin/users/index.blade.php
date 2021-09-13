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
                <div class="card-header" style="background-color: black; color:white">{{ __('Users') }}</div>

                <div class="card-body" style="background-color: rgb(172, 172, 172); color:white">

                  @if ($isEmpty)
                            @if ($onSearch)
                                <div>No users found <br>
                                    <a href="{{ route('admin.users.index') }}">
                                        <button type="button" class="btn btn-primary btn-sm">Back</button>
                                    </a>
                                </div>
                            @else
                                <div>No users found</div>
                            @endif
                        @else
                            <form class="d-flex" action="{{ route('admin.users.index') }}" method="GET" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search by name or e-mail"
                                    aria-label="Search" name="search-text" id="search-text">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
                            </form>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(
                                        ',',
                                        $user->roles()->get()->pluck('name')->toArray(),
                                    ) }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}">
                                            <button type="button" class="btn btn-primary btn-sm">Manage</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{-- {{ $users->links() }} --}}
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection