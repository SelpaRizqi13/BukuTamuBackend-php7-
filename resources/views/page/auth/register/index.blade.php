@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Buku Tamu DISKOMINFO</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Registration</p>
                <form action="{{ url('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required placeholder="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    @foreach ($errors->get('name') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @foreach ($errors->get('email') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @foreach ($errors->get('password') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <small>Already Registered?<a href="/login">Login</a></small>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
