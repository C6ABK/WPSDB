@extends('layouts.app')

@section('content')
    <div id="front-card">
        <div class="front-content col-lg-12">
            <div class="px-4 my-5 text-center">
                <img class="d-block mx-auto mb-4" src="/images/W.png" alt="" width="auto" height="175">
                <h1 class="display-5 fw-bold">Process Sheet Database</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4 ">Select your plant to view process sheets</p>

                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 mx-2 shadow disabled" href="#">Morning Goods</a>
                        <a class="btn btn-primary btn-lg px-4 mx-2 shadow" href="{{ route('hotplate.index') }}">Hotplate</a>
                        <a class="btn btn-outline-secondary btn-lg px-4 mx-2 shadow" href="{{ route('dashboard') }}">Admin Log In</a>
                    </div>


                <!-- <div class="dev-msg">Development version - no real data</div> -->
            </div>
        </div>
    </div>

@endsection
