@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card shadow mx-auto">
            <div class="card-body">
                <h4 class="mb-4">Product List</h4>

                <div class="row px-2">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('settings.product') }}" method="POST">
                                    @csrf
                                    <div class="my-3">
                                        <div class="form-floating">
                                            <input type="number" class="shadow-none form-control form-control-login @error('product_id') is-invalid @enderror"
                                                id="product_id" name="product_id" value="{{ old('product_id') }}">

                                            <label for="product_id">SAP Product ID</label>
                                            @error('product_id')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <input type="text" class="shadow-none form-control form-control-login @error('product_title') is-invalid @enderror"
                                                id="product_title" name="product_title" value="{{ old('product_title') }}">

                                            <label for="product_title">Product Title</label>
                                            @error('product_title')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <select class="shadow-none form-control form-control-login @error('plant') is-invalid @enderror"
                                                id="plant" name="plant" value="{{ old('plant') }}">
                                                <option disabled selected value></option>
                                                <option>MG</option>
                                                <option>HP</option>
                                            </select>
                                            <label for="plant">Plant</label>
                                            @error('plant')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="form-floating">
                                            <select class="shadow-none form-control form-control-login @error('type') is-invalid @enderror"
                                                id="type" name="type" value="{{ old('type') }}">
                                                <option disabled selected value></option>
                                                <option>Mix</option>
                                                <option>Dough/Batter</option>
                                                <option>Finished Product</option>
                                            </select>
                                            <label for="type">Product Type</label>
                                            @error('type')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block h-100 w-100 shadow-none">Add New Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h5>Active Product List</h5>
                                @if ($products->count())
                                <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Product Title</th>
                                            <th scope="col">Plant</th>
                                            <th scope="col">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="col-sm-2">{{ $product->product_id }}</td>
                                            <td class="col-sm-7">{{ $product->product_title }}</td>
                                            <td class="col-sm-1">{{ $product->plant}}</td>
                                            <td class="col-sm-2">{{ $product->type }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                @else
                                    <p>No active products...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
