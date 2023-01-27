@extends('admin.layouts.empty')
@section('content')
    <div class="d-flex align-content-center w-100 h-100 align-items-center">
        <div class="card">
            <form method="POST" action="{{route('admin.login')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input value="admin" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input value="123456" name="password" class="form-control"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@stop
