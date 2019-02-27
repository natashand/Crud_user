@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="container">
                <div class="row">
                    <h2>Users</h2>
                </div>
                <div class="row">
                    <div class="float-right">
                        <a type="button" href="/user/create" class="btn btn-success">Create</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Action</td>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(json_decode($users) as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <a type="button" class="btn btn-info small" href="user/{{$user->id}}/edit">Edit</a>
                                    <a type="button" class="btn btn-danger small" href="user/{{$user->id}}/delete">Delete</a>
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
