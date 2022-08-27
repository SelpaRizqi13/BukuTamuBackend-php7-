@extends('layouts.auth')

@section('content')
    <div class="login-box">
        
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @error('error')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="login-logo">
            <a href="/"><b>Buku Tamu DISKOMINFO</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login to Dashboard</p>

                <form action="/login" method="post" class="needs-validation" novalidate="">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control"
                            name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    {{-- @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    @error('email')
                <div class="invalid-feedback mb-3" style="display: block;">
                    {{ $message }}
                </div>
                @enderror
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control "
                            name="password"  autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback mb-3" style="display: block;">
                        {{ $message }}
                    </div>
                    @enderror
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                <small>Not Registered? <a href="/register">Register Now!</a></small>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
