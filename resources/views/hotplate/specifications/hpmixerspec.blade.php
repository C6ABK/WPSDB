@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <form action="{{ route('hotplate.specifications.hpmixerspec') }}" method="POST">
        @csrf
        <div class="row">
            <div class="card shadow mx-auto mb-4">
                <div class="card-body">
                    <h4>Create Hotplate Mixer Specification</h4>
                    <hr>
                    <div class="row">

                        <div class="col-lg-12 form-margin">
                            <!-- SELECT PRODUCT -->
                            <select class="shadow-none form-control form-control-login @error('product_id') is-invalid @enderror"
                                id="product_id" name="product_id" value="{{ old('product_id') }}">
                                <option disabled selected value>Select Product...</option>
                            @if ($products->count())
                                @foreach ($products as $product)
                                <option value="{{ $product->product_id }}">{{ $product->product_id }} - {{ $product->product_title }}</option>
                                @endforeach
                            @else
                                <option disabled>No products </option>
                            @endif
                            </select>
                            @error('select_product')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                    </div>

                    <hr class="mt-4">

                    <div class="row">

                        <!--  WATER WEIGHT -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Water Weight</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_weight_low') is-invalid @enderror"
                                        id="water_weight_low" name="water_weight_low" placeholder=" " value="{{ old('water_weight_low') }}">

                                    <label for="water_weight_low">Water Weight Low</label>
                                    @error('water_weight_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_weight_high') is-invalid @enderror"
                                        id="water_weight_high" name="water_weight_high" placeholder=" " value="{{ old('water_weight_high') }}">

                                    <label for="water_weight_high">Water Weight High</label>
                                    @error('water_weight_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- WATER TEMP -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Water Temp.</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature_low') is-invalid @enderror"
                                        id="water_temperature_low" name="water_temperature_low" placeholder=" " value="{{ old('water_temperature_low') }}">

                                    <label for="water_temperature_low">Water Temp. Low</label>
                                    @error('water_temperature_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature_high') is-invalid @enderror"
                                        id="water_temperature_high" name="water_temperature_high" placeholder=" " value="{{ old('water_temperature_high') }}">

                                    <label for="water_temperature_high">Water Temp. High</label>
                                    @error('water_temperature_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- WATER TEMP ACT -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Water Temp. ACT</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature_act_low') is-invalid @enderror"
                                        id="water_temperature_act_low" name="water_temperature_act_low" placeholder=" " value="{{ old('water_temperature_act_low') }}">

                                    <label for="water_temperature_act_low">Water Temp. ACT Low</label>
                                    @error('water_temperature_act_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature_act_high') is-invalid @enderror"
                                        id="water_temperature_act_high" name="water_temperature_act_high" placeholder=" " value="{{ old('water_temperature_act_high') }}">

                                    <label for="water_temperature_act_high">Water Temp. ACT High</label>
                                    @error('water_temperature_act_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- BATTER TEMP -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Batter Temp.</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('batter_temperature_low') is-invalid @enderror"
                                        id="batter_temperature_low" name="batter_temperature_low" placeholder=" " value="{{ old('batter_temperature_low') }}">

                                    <label for="batter_temperature_low">Batter Temp. Low</label>
                                    @error('batter_temperature_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('batter_temperature_high') is-invalid @enderror"
                                        id="batter_temperature_high" name="batter_temperature_high" placeholder=" " value="{{ old('batter_temperature_high') }}">

                                    <label for="batter_temperature_high">Batter Temp. High</label>
                                    @error('batter_temperature_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>

                    <hr class="mt-4">

                    <div class="row">
                        <!--  GREASE PSI -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Grease PSI</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('grease_psi_low') is-invalid @enderror"
                                        id="grease_psi_low" name="grease_psi_low" placeholder=" " value="{{ old('grease_psi_low') }}">

                                    <label for="grease_psi_low">Grease PSI Low</label>
                                    @error('grease_psi_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('grease_psi_high') is-invalid @enderror"
                                        id="grease_psi_high" name="grease_psi_high" placeholder=" " value="{{ old('grease_psi_high') }}">

                                    <label for="grease_psi_high">Grease PSI High</label>
                                    @error('grease_psi_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--  OVEN EXIT CRUMPET WEIGHT -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Oven Exit Crumpet Weight</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('oven_exit_crumpet_weight_low') is-invalid @enderror"
                                        id="oven_exit_crumpet_weight_low" name="oven_exit_crumpet_weight_low" placeholder=" " value="{{ old('oven_exit_crumpet_weight_low') }}">

                                    <label for="oven_exit_crumpet_weight_low">Oven Exit Weight Low</label>
                                    @error('oven_exit_crumpet_weight_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('oven_exit_crumpet_weight_high') is-invalid @enderror"
                                        id="oven_exit_crumpet_weight_high" name="oven_exit_crumpet_weight_high" placeholder=" " value="{{ old('oven_exit_crumpet_weight_high') }}">

                                    <label for="oven_exit_crumpet_weight_high">Oven Exit Weight High</label>
                                    @error('oven_exit_crumpet_weight_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--  HOTPLATE SET TEMPERATURE -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Hotplate SET Temp.</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_set_temperature_low') is-invalid @enderror"
                                        id="hotplate_set_temperature_low" name="hotplate_set_temperature_low" placeholder=" " value="{{ old('hotplate_set_temperature_low') }}">

                                    <label for="hotplate_set_temperature_low">Hotplate SET Temp. Low</label>
                                    @error('hotplate_set_temperature_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_set_temperature_high') is-invalid @enderror"
                                        id="hotplate_set_temperature_high" name="hotplate_set_temperature_high" placeholder=" " value="{{ old('hotplate_set_temperature_high') }}">

                                    <label for="hotplate_set_temperature_high">Hotplate SET Temp. High</label>
                                    @error('hotplate_set_temperature_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--  HOTPLATE ACT TEMPERATURE -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Hotplate ACT Temp.</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_act_temperature_low') is-invalid @enderror"
                                        id="hotplate_act_temperature_low" name="hotplate_act_temperature_low" placeholder=" " value="{{ old('hotplate_act_temperature_low') }}">

                                    <label for="hotplate_act_temperature_low">Hotplate ACT Temp. Low</label>
                                    @error('hotplate_act_temperature_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_act_temperature_high') is-invalid @enderror"
                                        id="hotplate_act_temperature_high" name="hotplate_act_temperature_high" placeholder=" " value="{{ old('hotplate_act_temperature_high') }}">

                                    <label for="hotplate_act_temperature_high">Hotplate ACT Temp. High</label>
                                    @error('hotplate_act_temperature_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4">

                    <div class="row">
                        <!--  INTERNAL TEMPERATURE -->

                        <div class="col-lg-3 pt-2">
                            <div class="card p-3">
                                <h5>Internal Temp.</h5>

                                <div class="form-floating form-margin mb-3 mt-2">
                                    <input type="number" class="shadow-none form-control form-control-login @error('internal_temperature_low') is-invalid @enderror"
                                        id="internal_temperature_low" name="internal_temperature_low" placeholder=" " value="{{ old('internal_temperature_low') }}">

                                    <label for="internal_temperature_low">Internal Temp. Low</label>
                                    @error('internal_temperature_low')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating form-margin mb-3">
                                    <input type="number" class="shadow-none form-control form-control-login @error('internal_temperature_high') is-invalid @enderror"
                                        id="internal_temperature_high" name="internal_temperature_high" placeholder=" " value="{{ old('internal_temperature_high') }}">

                                    <label for="internal_temperature_high">Internal Temp. High</label>
                                    @error('internal_temperature_high')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="offset-lg-3 col-lg-6">
                            <div class="form-floating">
                                <!-- SUBMIT -->
                                <button class="btn btn-lg btn-primary btn-block w-100 h-100 mt-1 shadow-none" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
