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
                    <h2>Users/Edit</h2>
                </div>
                <div class="col-md-10">
                    <form method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Name</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Last name</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="password" value="{{$user->password}}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Phone</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-3 col-md-offset-2">Address</label>
                                <div class="col-md-7">
                                    <textarea type="text" rows="3" class="form-control" name="address">{{$user->address}}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
