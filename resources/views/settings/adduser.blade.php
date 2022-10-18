@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card shadow mx-auto">
            <div class="card-body">
                <h4 class="mb-4">Add User</h4>
                <div class="row px-2">

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('settings.adduser') }}" method="POST">
                                    @csrf

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <input type="text" class="shadow-none form-control form-control-login @error('first_name') is-invalid @enderror"
                                                id="first_name" name="first_name" placeholder=" " value="{{ old('first_name') }}">

                                            <label for="first_name">First Name</label>
                                            @error('first_name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <input type="text" class="shadow-none form-control form-control-login @error('last_name') is-invalid @enderror"
                                                id="last_name" name="last_name" placeholder=" " value="{{ old('last_name') }}">

                                            <label for="last_name">Last Name</label>
                                            @error('last_name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <input type="number" class="shadow-none form-control form-control-login @error('id_number') is-invalid @enderror"
                                                id="id_number" name="id_number" placeholder=" " value="{{ old('id_number') }}">

                                            <label for="id_number">ID Number</label>
                                            @error('id_number')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block h-100 w-100 shadow-none">Add User</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h5>Active Users</h5>
                                @if ($users->count())
                                <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">ID Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->id_number }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                @else
                                    <p>No users to show...</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
