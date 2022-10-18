@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card shadow mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-inline-block">
                        <h3>Scheduler</h3>
                    </div>
                </div>
                <hr>
                <form action="{{ route('scheduler') }}" method="POST">
                    <div class="row">
                        <h5>Add New Schedule Item</h5>
                        @csrf
                        <div class="login-container col-xl-2">
                            <!-- SEQ NO -->
                            <div class="form-floating">
                                <input type="number" class="shadow-none form-control form-control-login @error('sequence_number') is-invalid @enderror"
                                    id="sequence_number" name="sequence_number" placeholder="12345" value="{{ old('sequence_number') }}">

                                <label for="sequence_number">Sequence no.</label>
                                @error('sequence_number')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="login-container col-xl-2">
                            <!-- RUN NO -->
                            <div class="form-floating">
                                <input type="number" class="shadow-none form-control form-control-login @error('run_number') is-invalid @enderror"
                                    id="run_number" name="run_number" placeholder="1" value="{{ old('run_number') }}">

                                <label for="run_number">Run no.</label>
                                @error('run_number')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="login-container col-xl-2">
                            <!-- PROCESS NO -->
                            <div class="form-floating">
                                <input type="number" class="shadow-none form-control form-control-login @error('process_number') is-invalid @enderror"
                                    id="process_number" name="process_number" placeholder="12345" value="{{ old('process_number') }}">

                                <label for="process_number">Process Number</label>
                                @error('process_number')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="login-container col-xl-2">
                            <!-- PRODUCT ID -->
                            <div class="form-floating">
                                <input type="number" class="shadow-none form-control form-control-login @error('product_id') is-invalid @enderror"
                                    id="product_id" name="product_id" placeholder="12345" value="{{ old('product_id') }}">

                                <label for="product_id">Product ID</label>
                                @error('product_id')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="login-container col-xl-2">
                            <!-- SALES DATE -->
                            <div class="form-floating">
                                <input type="date" class="shadow-none form-control form-control-login @error('sales_date') is-invalid @enderror"
                                    id="sales_date" name="sales_date" placeholder="12345" value="{{ old('sales_date') }}">

                                <label for="sales_date">Sales Date</label>
                                @error('sales_date')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="login-container col-xl-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-1 w-100 shadow-none">Add Item</button>
                        </div>

                    </div>
                </form>
                <hr>
                <div class="row">
                <h5 class="col-md-6">Current Items in Schedule</h5>
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger float-end btn-sm shadow-none">Clear Schedule</button>
                </div>
                @if ($schedulers->count())
                    <div class="login-container">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sequence No.</th>
                                <th scope="col">Run No.</th>
                                <th scope="col">Process No.</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Sales Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($schedulers as $item)

                            <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->sequence_number }}</td>
                            <td>{{ $item->run_number }}</td>
                            <td>{{ $item->process_number }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product->product_title }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->sales_date)) }}</td>
                            <td class="text-center">
                                <form action="{{ route('scheduler.destroy', $item ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="scheduleDelete"><i class="bi bi-x-circle-fill"></i></button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                @else
                    <p>No items in scheduler...</p>
                @endif
                </div>
            </div>
        </div>
    </div>

@endsection
