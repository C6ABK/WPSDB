@extends('layouts.app')

@section('content')
    <div class="container" id="login-form">
        <div class="card shadow col-xl-4 login-card mx-auto" >
            <div class="card-body">
                <h4 class="form-control-login">Admin User Log In</h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="login-container">
                        <div class="form-floating">
                            <input type="email" class="shadow-none form-control form-control-login @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">

                            <label for="email">Email address</label>
                            @error('email')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="login-container">
                        <div class="form-floating">
                            <input type="password" class="shadow-none form-control form-control-login @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">

                            <label for="password">Password</label>
                            @error('password')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if (session('status'))
                    <p class="error-message">{{ session('status') }}</p>
                    @endif

                    <div class="login-container">
                        <div class="d-grid form-floating">
                            <button class="shadow-none btn btn-primary btn-lg" type="submit">Log In</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
