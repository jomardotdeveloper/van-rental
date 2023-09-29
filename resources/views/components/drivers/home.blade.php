@extends('dashboard.layouts.driver-dashboard')
@section('contents')
    <!-- main contents -->
    <div class="head navbar mx-3 bg-white mt-3 pngtree-img-file-document-icon-png-image_913759 container-fluid border rounded"
        style="width: 97.8%;">
        <h5 class="mx-4 mt-2"><span class="secondary-color mx-2"><b>|</b></span> <span class="secondary-color">Dashboard</span> | <span
                class="secondary-color h6">Welcome {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span> </h5>
        <div class="d-flex mx-3  mt-2 secondary-color">
            <span class="h5 me-4 ">
                <i class='bx bxs-home'></i>
            </span>
            <span class="h6 me-2">
                <span>Home</span>
            </span>
            <span class="h5 me-2">
                <i class='bx bx-chevrons-right'></i>
            </span>
            <span class="h6">
                <a href="#" class="secondary-color">Dashboard</a>
            </span>
        </div>
    </div>
    <!-- boxes -->
    <div class="mx-3 mt-3" style="overflow-x: hidden">
        <div class="row">

            <div class="col-sm-3 mb-3 mb-sm-0" id="box">
                <div class="card p-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-sm-4 col-4">
                            <span class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/dash/dash-1.png') }}" alt="dash-1" width="80">
                            </span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <span class="mx-auto mb-2 secondary-color"><b>Vehicle Registration</b></span>
                                {{-- id="status" --}}
                                <span class="mx-auto text-info mb-2">Check Status</span>
                                <div class="d-flex mx-auto">
                                    <a class="mr-1 me-1" href="{{ route('register.vehicle') }}">Registration</a>
                                    <span class="text-success">|</span>
                                    <a class="ml-1 mx-1" id="vehicle-status" href="#">Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3 mb-sm-0" id="box">
                <div class="card p-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-sm-4 col-4">
                            <span class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/dash/dash-2.png') }}" alt="dash-1" width="80">
                            </span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <span class="mx-auto secondary-color"><b>Vehicle Maintenance</b></span>
                                <span class="mx-auto text-danger" id="maintenance-display">Not Available</span>
                                <div class="d-flex mx-auto">
                                    <a class="mr-1 me-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#maintenance">Set Status</a>
                                    {{-- <span class="text-success">|</span> --}}
                                    {{-- <a class="ml-1 mx-1" id="vehicle-status" href="#">Status</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3 mb-sm-0" id="box">
                <div class="card p-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-sm-4 col-4">
                            <span class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/dash/dash-3.png') }}" alt="dash-1" width="80">
                            </span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <span class="mx-auto text-danger"><b>Not Available</b></span>
                                <span class="mx-auto text-secondary">version 2.0</span>
                                {{-- <div class="d-flex mx-auto">
                          <a class="mr-1 me-1" href="{{ route('register.vehicle') }}">Registration</a>
                          <span class="text-success">|</span>
                          <a class="ml-1 mx-1" id="vehicle-status" href="#">Status</a>
                        </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3 mb-sm-0" id="box">
                <div class="card p-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-sm-4 col-4">
                            <span class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/dash/dash-3.png') }}" alt="dash-1" width="80">
                            </span>
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="d-flex flex-column justify-content-center h-100">
                                <span class="mx-auto text-danger"><b>Not Available</b></span>
                                <span class="mx-auto text-secondary">version 2.0</span>
                                {{-- <span class="mx-auto" id="status"></span>
                        <div class="d-flex mx-auto">
                          <a class="mr-1 me-1" href="{{ route('register.vehicle') }}">Registration</a>
                          <span class="text-success">|</span>
                          <a class="ml-1 mx-1" id="vehicle-status" href="#">Status</a>
                        </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- table -->
    <div class='row p-3 mx-auto'>
        <div class='col-md-12 bg-light secondary-color p-3 border rounded' style="height: 500px">
            <span class="mx-2">Customer Information Table</span>
            <input type="number" id="driver-id" value="{{ Auth::user()->id }}" hidden>
            <div class='table-responsive'>
                <table class='table table-hover' id='booked'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Destination</th>
                            <th>Pick Up</th>
                            <th>Land Mark</th>
                            <th>Date of Trip</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    @include('components.drivers.customer-info')
    @yield('customer.info')

@endsection

