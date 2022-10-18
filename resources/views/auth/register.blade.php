@extends('layouts.app')

@section('content')
    <div class="container" id="login-form">
        <div class="card shadow col-xl-4 login-card mx-auto" >
            <div class="card-body">
                <h4 class="form-control-login">Register New Admin User</h4>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="login-container">
                        <div class="form-floating">
                            <input type="text" class="shadow-none form-control form-control-login @error('first_name') is-invalid @enderror"
                                id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">

                            <label for="first_name">First Name</label>
                            @error('first_name')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="login-container">
                        <div class="form-floating">
                            <input type="text" class="shadow-none form-control form-control-login  @error('last_name') is-invalid @enderror"
                                id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">

                            <label for="last_name">Last Name</label>
                            @error('last_name')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

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

                    <div class="login-container">
                        <div class="form-floating">
                            <input type="password" class="shadow-none form-control form-control-login @error('password') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">

                            <label for="password_confirmation">Password Confirmation</label>
                        </div>
                    </div>

                    <div class="login-container">
                        <div class="d-grid form-floating">
                            <button class="shadow-none btn btn-primary btn-lg" type="submit">Register</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
