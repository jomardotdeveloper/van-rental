{{-- @extends('dashboard.layouts.driver-dashboard') --}}
@section('location-modal')
    <!-- Modal -->
    {{-- <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLabel">Share Your Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            
                        <div class="text-center p-3">
                            <h4 class="mb-4">Enhance Your Experience with Accurate Location</h4>
                            <p>Click the button below to share your location with us and receive personalized services and faster delivery options.</p>
                            <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#locationModal">Share My Location</button>
                        </div>
                   
                    <p>Click "Allow" to share your location for a better user experience.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Allow</button>
                   
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade"  id="locationModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Share Your Location</h5>
            </div>
            <div class="modal-body">
                <div class="text-center p-3">
                    <h4 class="mb-4">Enhance Your Experience with Accurate Location</h4>
                    <p>Click the button below to share your location with us and receive personalized services and faster delivery options.</p>
                    <button class="btn btn-primary mt-3 mx-auto" id="getlocation">
                        <i class='bx bx-current-location'></i>
                        Share My Location
                    </button>
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal" aria-label="Close">
                        <i class='bx bxs-x-circle'></i>
                        Declined
                    </button>

                    <p id="message" class="mt-2">Click "Allow" to share your location for a better user experience.</p>
                    <ol id="ol" class="mt-3">

                    </ol>
                </div>
           
                
            </div>
          </div>
        </div>
      </div>
@endsection