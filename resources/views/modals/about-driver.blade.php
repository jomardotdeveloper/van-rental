@section('about-driver-modal')
<div class="modal fade" id="about-driver-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h1 class="modal-title fs-5 d-flex justify-content-center" id="exampleModalLabel">
                    <i class='bx bxs-user h1' ></i>
                </h1>
                <b><span class="h3 ml-2">Drivers Information</span></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    
                    <h1>Driver Information here</h1>
                    <h1>Service Offered here</h1>
                    
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-info form-control text-white">INQUIRE NOW!</button>
                    {{-- <p class="text-secondary form-control border-0">Don't have an account? <span class="text-info"><a href="#" data-bs-toggle="modal" data-bs-target="#signup-modal">Register here</a></span></p> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection