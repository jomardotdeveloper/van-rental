@extends('dashboard.layouts.driver-dashboard')
@section('contents')
    <!-- main contents -->
    <div class="head navbar bg-body-tertiary mx-3 mt-3 pngtree-img-file-document-icon-png-image_913759 container-fluid border rounded"
        style="width: 97.8%;">
        <h5 class="mx-4 mt-2"><span class="text-success mx-2"><b>|</b></span>Dashboard | <span
                class="text-secondary h6">Welcome {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span> </h5>
        <div class="d-flex mx-3 mt-2">
            <span class="h5 me-4">
                <i class='bx bxs-home'></i>
            </span>
            <span class="h6 me-2">
                <span>Register Vehicle</span>
            </span>
            <span class="h5 me-2">
                <i class='bx bx-chevrons-right'></i>
            </span>
            <span class="h6">
                <a href="#">Dashboard</a>
            </span>
        </div>
    </div>
    <div class="p-2">
        <div class="">
            <form action="{{ route('register.vehicle') }}" method="post" class="row mx-2" enctype="multipart/form-data">
                @csrf
                <div class="container p-3">
                    <div class="row bg-light rounded p-4">
                        <span class="mx-3 h5">Vehicle Registration Form</span>
                        
                        <div class="col-sm-6 p-2 row mb-2">
                            <div class="col-sm-4 border p-2 mx-auto">
                            
                                {{-- ID No --}}
                                <input type="number" name="id" class="form-control" id="idNumber"
                                    value="{{ Auth::user()->id }}" hidden required>
                                {{-- ID No --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="number" name="idNumber" class="form-control" id="idNumber"
                                            placeholder="ID NO." required>
                                    </div>
                                </div>

                                {{-- ORCR --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="orcr" class="form-control" id="orcr"
                                            placeholder="ORCR" required>
                                    </div>
                                </div>

                                {{-- Vehicle Plate Number --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="plateNumber" class="form-control" id="plateNumber"
                                            placeholder="Vehicle Plate Number" required>
                                    </div>
                                </div>
                            </div>

                            {{-- driver licensed --}}
                            <div class="col-md-6 border rounded active mx-auto p-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label h6 text-white mx-auto">
                                        Upload your Driver's Licensed
                                    </label>
                                    <input type="file" name="imageLicensed" class="form-control" id="vehicle-licensed"
                                        credits="false" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 row mb-2">
                            <div class="col-sm-8 border mx-auto row p-2">
                    
                                {{-- fullname --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="fullname" class="form-control" id="fullname"
                                            placeholder="Full Name" value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" required>
                                    </div>
                                </div>

                                {{-- Company Name --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="companyName" class="form-control"
                                            id="companyName" placeholder="Company Name" required>
                                    </div>
                                </div>
                                {{-- Address --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="Company Address" required>
                                    </div>
                                </div>
                                {{-- model --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="model" class="form-control" id="model"
                                            placeholder="Model" required>
                                    </div>
                                </div>
                                {{-- Specification --}}
                                <div class="col-md-12 mx-auto row">

                                    <div class="col-md-12 mx-auto text-center">
                                        <div class="mb-3">
                                            <label for="specification" class="form-label text-center h6">
                                                VEHICLE SPECIFICATION
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <input type="number" name="bags" class="form-control" id="bags"
                                                placeholder="No. of Bags" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <input type="number" name="seats" class="form-control" id="seats"
                                                placeholder="No. of Seats" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <select name="ac" class="form-control text-secondary" id="ac"
                                                required>
                                                <option value="">Aircon Type</option>
                                                <option value="Dual">Dual Aircon</option>
                                                <option value="Single">Single Aircon</option>
                                                <option value="NA">Not Available</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <select name="fuel" class="form-control text-secondary" id="fuel"
                                                required>
                                                <option value="">Fuel Type</option>
                                                <option value="Gasoline">Gasoline</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="E-Batteries">E-Batteries</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- Vehicle --}}
                            <div class="col-md-4 border rounded active mx-auto p-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label h6 text-white mx-auto">
                                        Upload your Vehicle
                                    </label>
                                    <input type="file" name="imageVehicleProfile" class="form-control"
                                                id="vehicle-image" credits="false" required>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 border">
                    <div class="mb-3">
                        <div class="d-flex justify-content-end">
                            <div class="d-grid w-30 active">
                                <button class="btn text-white">Register Vehicle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
