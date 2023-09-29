@section('links')
    <style>
        .second-title{
            color: #6096BA;
        }
    </style>
@endsection
@section('inquire.form')
    <!-- Modal -->
    <div class="modal fade" id="inquiry" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="inquiryModalLabel">Inquiry Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body p-4">
                    {{-- <div class="row justify-content-center align-items-center p-5"> --}}
                    <form action="#" method="POST" id="form-inquiry">
                        @csrf
                        {{-- driver id --}}
                        <input type="number" name="id" class="form-control" id="driver-id"
                                    placeholder="Driver ID" hidden required>

                        <div class="p-2">
                            <span class="bx bx-left-arrow-alt" id="back"></span>
                            Inquiry Form
                        </div>
                        <div class="section-title text-center p-2 ">
                            Personal Information
                            {{-- {{ Auth::user() }} --}}
                        </div>
                        {{-- first name --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" name="firstname" class="form-control" id="firstname"
                                    placeholder="First Name" required value="{{ Auth::user()->firstname }}">
                            </div>
                        </div>
                        {{-- last name --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" name="lastname" class="form-control" id="lastname"
                                    placeholder="Last Name" required value="{{ Auth::user()->lastname }}">
                            </div>
                        </div>
                        {{-- middle name --}}
                        <div class="col-md-12 col-sm-12">
                            <div class="mb-3">
                                <input type="text" name="middlename" class="form-control" id="middlename"
                                    placeholder="Middle Name" required value="{{ Auth::user()->middlename }}">
                            </div>
                        </div>
                        <div class="row">
                            {{-- Contact --}}
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <input type="tel" name="contact" class="form-control" id="contact"
                                    placeholder="Contact: +63" required pattern="[0-9]{10}"
                                    title="Please enter a valid 10-digit mobile number" value="0{{ Auth::user()->contact }}">
                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Email" required value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="section-title text-center p-2">Rental Information</div>
                        {{-- destination --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" name="destination" class="border-bottom-only form-control" id="destination"
                                    placeholder="Destination Exact Address" required>
                            </div>
                        </div>
                        {{-- pickup --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" name="pickup" class="border-bottom-only form-control" id="pickup"
                                    placeholder="Complete Address / Pickup Location" required>
                            </div>
                        </div>
                        {{-- landmark --}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" name="landmark" class="border-bottom-only form-control" id="landmark"
                                    placeholder="Landmark" required>
                            </div>
                        </div>
                        {{-- Date --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="dateoftrip" class="border-bottom-only form-control"
                                    onfocus="(this.type='date')" id="dateoftrip" placeholder="Date of Trip" required>
                            </div>
                        </div>
                        {{-- no of pax --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="number" name="pax" class="border-bottom-only form-control" id="pax"
                                    placeholder="No. Of Pax" required>
                            </div>
                        </div>
                        {{-- days and hour --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="number" name="daysandhours" class="border-bottom-only form-control" id="daysandhours"
                                    placeholder="No. of Days/Hours" required>
                            </div>
                        </div>
                        {{-- pick up time --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="pickuptime" class="border-bottom-only form-control"
                                    onfocus="(this.type='time')" id="pickuptime" placeholder="Pick Up Time" required>
                            </div>
                        </div>

                        {{-- down payment --}}
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <input type="number" name="downpayment" class="border-bottom-only" id="downpayment"
                                    placeholder="Down Payment" required>
                            </div>
                        </div> --}}

                        <div class="mb-3 text-center d-flex justify-content-center">
                            <div class="d-grid">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Agree to <a href="#">terms and conditions.</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary" type="button" id="submit-form"><b>Submit Form</b></button>
                            </div>
                        </div>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="d-grid">
                                <a href="{{ route('register.driver') }}" class="btn btn-primary">Driver</a>
                            </div>
                        </div> --}}
                    </form>
                    {{-- </div> --}}
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
