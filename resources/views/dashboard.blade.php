@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">

            <div class="col-md-2">
                <div class="card shadow mx-auto">
                    <div class="card-body text-center">
                        <a href="{{ route('settings.product') }}" class="adminLink">Product List</a>
                        <hr>
                        <a href="{{ route('scheduler') }}" class="adminLink">Scheduler</a>
                        <hr>
                        <a href="{{ route('hotplate.specifications.hpmixerspec') }}" class="adminLink">HP Mixer Spec</a>
                        <hr>
                        <a href="{{ route('settings.adduser') }}" class="adminLink">Add User</a>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mx-auto h-100">
                            <div class="card-body">
                                <h5>High Priority</h5>
                                <ul>
                                    <li>"Comments cannot be null" bug on HPMixer when in spec</li>
                                    <li>Regular User creation - accessible by admins</li>
                                    <li>Link User ID to regular user HP Mixer recent entries</li>
                                    <li>Mixer Spec reselect product from product list</li>
                                    <li>Mixer store route</li>
                                    <li>Cooling room spec & main</li>
                                    <li>Packing room spec & main</li>
                                    <li>Searchable table reports</li>
                                    <li>Graph report examples</li>
                                    <li>Decimal steps for inputs on HP Mixer Spec</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mx-auto h-100">
                            <div class="card-body">
                                <h5>Low priority</h5>
                                <ul>
                                    <li>Custom validation for manual scheduler "process number taken"</li>
                                    <li>Scheduler sales date validation?</li>
                                    <li>Custom shorter validation messages in manual scheduler</li>
                                    <li>Excel scheduler upload</li>
                                    <li>Select previous product in dropdown after successful submission</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card shadow mx-auto">
                            <div class="card-body">
                                <h5>Done</h5>
                                <ul>
                                    <li>Auto select old product if it's in the dropdown</li>
                                    <li>Fix the height of "add item" button when validation is displayed</li>
                                    <li>Make process number/sequence number require unique values</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
