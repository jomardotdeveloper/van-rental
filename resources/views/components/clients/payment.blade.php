@section('payment.info')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="offcanvas offcanvas-end p-2" tabindex="-1" id="paymentInfo" aria-labelledby="offcanvasRightLabel">
                    <!-- Offcanvas content remains the same -->
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title input" id="offcanvasRightLabel">Reciept Submition form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text-center">
                        <div class="col-sm-12">
                            <div class="mb-2">
                                <input type="text" id="payment-status" class="form-control input" placeholder="Payment"
                                    readonly>
                            </div>
                        </div>
                        <div class="card border-0 active mb-3 rounded notification-container col-sm-12">
                            <div class="row g-0" id="pay-container">
                                <div class="col-md-2 justify-contents" id="image-profile">
                                    <img class="img-fluid rounded-start" src="#" alt=""
                                        id="profile-payments">
                                </div>
                                <div class="col-md-10" style="height: fit-content" id="contents">
                                    <div class="card-body">
                                        <span class="card-title" id="name-payments"><b>jaypee Quintana</b></span><br>
                                        <span class="card-text" id="gcash-payments">GCASH : 09270316695</span>
                                        {{-- <span class="card-text bx bxs-receipt"><small class="text-body-secondary text-secondary bx bxs-receipt"></small></span> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <div class="mb-2">
                                <input type="text" id="booking-id" class="form-control" placeholder="First Name">
                            </div>
                        </div> --}}
                        <div class="col-sm-12 border rounded p-2">
                            <div class="mb-2">
                                <span class="label"><b>Statement from Van Rental</b></span>
                                <p readonly class="">In order to confirm and secure all bookings, it is necessary for
                                    clients to make an initial payment towards their reservation. This practice is
                                    implemented to ensure the security of our drivers and the booking process.</p>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data" class="row g-3" id="recieptUploadForm">
                            @csrf
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <input type="number" name="reciever_id" class="form-control" id="reciever_id" required hidden>
                                    <label class="label text-center"><b>Upload your
                                            Reciept Here.</b></label>
                                    <input type="file" name="reciept" class="form-control" id="reciept-image" multiple
                                        credits="false" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12" id="chat-container">
                                    <div class="mb-3">
                                        <a href="#" type="button" id="chat-driver-side"
                                            class="btn btn-info text-white form-control bx bxs-receipt p-2 upload-reciept">Send the
                                            reciept</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
   
@endsection
