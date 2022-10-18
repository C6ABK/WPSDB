@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="card shadow mx-auto">
                <div class="card-body">
                    <h4>Hotplate Mixer - *needs to reselect product based on most recently submitted record - can do this when getting the records for recent entries</h4>
                    <hr class="mb-2">
                    <form action="{{ route('hotplate.mixer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-2 form-margin">
                                <!-- PLANT -->

                                <div>
                                    <div class="small-title">Plant</div>
                                    <select class="shadow-none form-control form-control-login @error('plant') is-invalid @enderror py-3"
                                        id="plant" name="plant" value="{{ old('plant') }}">
                                        <option disabled selected value>Select Plant</option>

                                        <!-- Reselect 1 if previous entry was 1 -->
                                        @if ( old('plant'))
                                            <option selected>1</option>
                                        @else
                                            <option>1</option>
                                        @endif

                                        <!-- Reselect 2 if previous entry was 2 -->
                                        @if ( old('plant'))
                                            <option selected>2</option>
                                        @else
                                            <option>2</option>
                                        @endif
                                    </select>
                                    @error('plant')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-10 form-margin">
                                <!-- SELECT PRODUCT -->

                                <div>
                                    <div class="small-title">Select Product</div>
                                    <select class="shadow-none form-control form-control-login @error('select_product') is-invalid @enderror py-3"
                                        id="select_product" name="select_product" value="{{ old('select_product') }}">
                                        <option disabled selected value>Select Product</option>
                                        @if ($products->count())
                                            @foreach ($products as $product)
                                                <?php $product_explode = explode('|', old('select_product')); ?>

                                                @if ($product_explode[0] == $product->process_number)
                                                    <option selected value="{{ $product->process_number }}|{{ $product->product_id }}">{{ $product->process_number }} - {{ $product->product_title }} - ({{ $product->product_id }}) - Sales Date: {{ date('d/m/Y', strtotime($product->sales_date)) }} </option>
                                                @else
                                                    <option value="{{ $product->process_number }}|{{ $product->product_id }}">{{ $product->process_number }} - {{ $product->product_title }} - ({{ $product->product_id }}) - Sales Date: {{ date('d/m/Y', strtotime($product->sales_date)) }} </option>
                                                @endif

                                            @endforeach
                                        @else
                                            <option disabled>No products in scheduler...</option>
                                        @endif
                                    </select>
                                    @error('select_product')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-3 form-margin">
                                <!-- WATER WEIGHT -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_weight') is-invalid @enderror"
                                        id="water_weight" name="water_weight" placeholder=" " value="{{ old('water_weight') }}" step=".01">

                                    <label for="water_weight">Water Weight</label>
                                    @error('water_weight')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- WATER TEMP -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature') is-invalid @enderror"
                                        id="water_temperature" name="water_temperature" placeholder=" " value="{{ old('water_temperature') }}" step=".01">

                                    <label for="water_temperature">Water Temperature</label>
                                    @error('water_temperature')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- WATER TEMP ACT -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('water_temperature_act') is-invalid @enderror"
                                        id="water_temperature_act" name="water_temperature_act" placeholder=" " value="{{ old('water_temperature_act') }}" step=".01">

                                    <label for="water_temperature_act">Water Temperature ACT</label>
                                    @error('water_temperature_act')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- BATTER TEMP -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('batter_temperature') is-invalid @enderror"
                                        id="batter_temperature" name="batter_temperature" placeholder=" " value="{{ old('batter_temperature') }}" step=".01">

                                    <label for="batter_temperature">Batter Temperature</label>
                                    @error('batter_temperature')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-3 form-margin">
                                <!-- GREASE PSI -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('grease_psi') is-invalid @enderror"
                                        id="grease_psi" name="grease_psi" placeholder=" " value="{{ old('grease_psi') }}" step=".01">

                                    <label for="grease_psi">Grease PSI</label>
                                    @error('grease_psi')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- OVEN EXIT CRUMPET WEIGHT -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('oven_exit_crumpet_weight') is-invalid @enderror"
                                        id="oven_exit_crumpet_weight" name="oven_exit_crumpet_weight" placeholder=" " value="{{ old('oven_exit_crumpet_weight') }}" step=".01">

                                    <label for="oven_exit_crumpet_weight">Oven Exit Crumpet Weight</label>
                                    @error('oven_exit_crumpet_weight')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- HOTPLATE SET TEMPERATURE -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_set_temperature') is-invalid @enderror"
                                        id="hotplate_set_temperature" name="hotplate_set_temperature" placeholder=" " value="{{ old('hotplate_set_temperature') }}" step=".01">

                                    <label for="hotplate_set_temperature">Hotplate SET Temperature</label>
                                    @error('hotplate_set_temperature')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 form-margin">
                                <!-- HOTPLATE ACT TEMPERATURE -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('hotplate_act_temperature') is-invalid @enderror"
                                        id="hotplate_act_temperature" name="hotplate_act_temperature" placeholder=" " value="{{ old('hotplate_act_temperature') }}" step=".01">

                                    <label for="hotplate_act_temperature">Hotplate ACT Temperature</label>
                                    @error('hotplate_act_temperature')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-3 form-margin">
                                <!-- Internal Temperature -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('internal_temperature') is-invalid @enderror"
                                        id="internal_temperature" name="internal_temperature" placeholder=" " value="{{ old('internal_temperature') }}" step=".01">

                                    <label for="internal_temperature">Internal Temperature</label>
                                    @error('internal_temperature')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <!-- BOARD BRUSHES -->

                                <div>
                                    <select class="shadow-none form-control form-control-login @error('board_brushes') is-invalid @enderror py-3"
                                        id="board_brushes" name="board_brushes" value="{{ old('board_brushes') }}">
                                        <option disabled selected value>Board Brushes</option>

                                        @if (old('board_brushes') == "Yes")
                                            <option selected>Yes</option>
                                        @else
                                            <option>Yes</option>
                                        @endif

                                        @if (old('board_brushes') == "No")
                                            <option selected>No</option>
                                        @else
                                            <option>No</option>
                                        @endif

                                    </select>
                                    @error('board_brushes')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 form-margin">
                                <div class="form-floating">
                                    <textarea class="form-control @error('comments') is-invalid @enderror shadow-none" id="comments" name="comments" placeholder=" " rows="2">{{ old('comments') }}</textarea>
                                    <label for="comments">Comments</label>
                                    @error('comments')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="offset-lg-6 col-lg-3 form-margin">
                                <!-- USER ID -->

                                <div class="form-floating">
                                    <input type="number" class="shadow-none form-control form-control-login @error('user_id') is-invalid @enderror"
                                        id="user_id" name="user_id" placeholder=" " value="{{ old('user_id') }}">

                                    <label for="user_id">User ID</label>
                                    @error('user_id')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 form-margin">
                                <div class="form-floating">
                                    <!-- SUBMIT -->
                                    <button class="btn btn-lg btn-primary btn-block w-100 h-100 mt-1 shadow-none" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card shadow mx-2 mt-4 mb-3">
            <div class="card-body">
                <h4>Recent Entries</h4>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Plant</th>
                            <th scope="col">Process No.</th>
                            <th scope="col">Time</th>
                            <th scope="col">Water Weight</th>
                            <th scope="col">Water Temp.</th>
                            <th scope="col">Water Temp. ACT</th>
                            <th scope="col">Batter Temp.</th>
                            <th scope="col">Grease PSI</th>
                            <th scope="col">Oven Ex. Wgt.</th>
                            <th scope="col">HP SET Temp.</th>
                            <th scope="col">HP ACT Temp.</th>
                            <th scope="col">Internal Temp.</th>
                            <th scope="col">Board Brushes</th>
                            <th scope="col">User</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($mixes as $mix)

                        <?php
                            $tz = new DateTimeZone('Europe/London');

                            if ($mix->board_brushes == 1){
                                $board_brushes_string = "Yes";
                            }
                            else {
                                $board_brushes_string = "No";
                            }
                        ?>

                        <tr>
                            <td>{{ $mix->id }}</td>
                            <td>{{ $mix->plant }}</td>
                            <td>{{ $mix->process_number }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($mix->created_at->setTimezone($tz) )) }}</td>
                            <td>{{ $mix->water_weight }}</td>
                            <td>{{ $mix->water_temperature }}</td>
                            <td>{{ $mix->water_temperature_act }}</td>
                            <td>{{ $mix->batter_temperature }}</td>
                            <td>{{ $mix->grease_psi }}</td>
                            <td>{{ $mix->oven_exit_crumpet_weight }}</td>
                            <td>{{ $mix->hotplate_set_temperature }}</td>
                            <td>{{ $mix->hotplate_act_temperature }}</td>
                            <td>{{ $mix->internal_temperature }}</td>
                            <td>{{ $board_brushes_string }}</td>
                            <td>{{ $mix->first_name }} {{ $mix->last_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
