@extends('dashboard.layouts.client-dashboard')

@section('contents')
    <br><br><br>
    <div class="">
        <div class="main-body p-2">
            {{-- {{ $account }} --}}
            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <form action="{{ route('update.account') }}" method="post">
                        @csrf
                        <input type="number" name="id" value="{{ $account->id }}" hidden>
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">

                                        <div class="row">
                                            <span class="primary-color"><b>Basic Information</b></span>
                                            <div class="col-sm-4 mb-2">
                                                <input type="text" class="form-control" name="firstname"
                                                    placeholder="First name" aria-label="First name" value="{{ $account->firstname }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="text" class="form-control" name="lastname"
                                                    placeholder="Last name" aria-label="Last name" value="{{ $account->lastname }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="text" class="form-control" name="middlename"
                                                    placeholder="Middle name" aria-label="Middle name" value="{{ $account->middlename }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="tel" name="contact" class="form-control" id="contact"
                                                    placeholder="+63" required pattern="[0-9]{10}"
                                                    title="Please enter a valid 10-digit mobile number" value="{{ $account->contact }}">
                                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.
                                                </div>
                                            </div>

                                            <div class="col-sm-8 mb-2">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email" aria-label="Email" value="{{ $account->email }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="date" class="form-control" name="date" aria-label="Date" value="{{ $account->birthdate }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="text" class="form-control" name="municipal"
                                                    placeholder="Municipal" aria-label="Municipal" value="{{ $account->municipality }}">
                                            </div>

                                            <div class="col-sm-4 mb-2">
                                                <input type="text" name="code" class="form-control"
                                                    placeholder="Zipcode" aria-label="Code" value="{{ $account->zipcode }}">
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <input type="text" class="form-control" name="street"
                                                    placeholder="Street" aria-label="Email" value="{{ $account->street }}">
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <input type="text" class="form-control" name="barangay"
                                                    placeholder="Barangay" aria-label="Email" value="{{ $account->barangay }}">
                                            </div>

                                            <div class="col-sm-12">
                                                <span class="primary-color"><b>Account</b></span>
                                                <div class="row">

                                                    <div class=" mb-2">
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Password" aria-label="Password">
                                                    </div>

                                                    @if(session()->has('failed'))   
                                                        <div class="alert alert-danger">Password Incorrect</div>
                                                    @endif

                                                    <div class=" mb-2">
                                                        <input id="new_password" type="text" name="new-password" class="form-control"
                                                            placeholder="New Password" aria-label="New Password">
                                                    </div>


                                                    <div class=" mb-2">
                                                        <input id="confirm_password" type="text" name="confirmed-password" class="form-control"
                                                            placeholder="Confirm Password" aria-label="Confirmed Password">
                                                    </div>


                                                    
                                                    <div class=" mb-2">
                                                        <input type="submit" class="form-control btn btn-info primary-color"
                                                            placeholder="Street and Barangay" aria-label="Email"
                                                            value="Update Profile" id="submit_profile" hidden>
                                                        <input type="button" class="form-control btn btn-info primary-color"
                                                            placeholder="Street and Barangay" aria-label="Email"
                                                            value="Update Profile" onclick="update_password()">
                                                    </div>


        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-8 card p-3 ">
                    <div class="row">
                        <h4 class="text-danger">Not Available</h4>
                        <div class="col-sm-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/auth/profile.js') }}"></script>
@endsection

