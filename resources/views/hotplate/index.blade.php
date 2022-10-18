@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-3">
                <div class="card shadow mx-auto">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <p class="adminLink pb-4">Hotplate Process Sheets</p>
                            <a class="btn btn-primary btn-lg btn-block w-100 shadow-none" href="{{ route('hotplate.mixer') }}">Mixer</a>
                            <hr>
                            <a class="btn btn-primary btn-lg btn-block w-100 shadow-none" href="{{ route('hotplate.cooling') }}">Cooling Room</a>
                            <hr>
                            <button class="btn btn-primary btn-lg btn-block w-100 shadow-none">Packing Room</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 mt-3">
                <div class="card shadow mx-auto">
                    <div class="card-body">
                        <h4>Hotplate</h4>
                        <div class="row">
                            <p>Use the buttons on the left to access the hotplate process sheets. To view reports or full database records - login to see the dashboard page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
