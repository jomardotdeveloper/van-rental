@section('view-modal')
    {{-- view modal --}}
    <div class='modal fade' id='viewModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-xl'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title text-secondary' id='exampleModalLabel'><b>Van Rental View Section</b></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    {{-- <p>{{ url('storage/') }}</p> --}}
                    {{-- <img src="{{ storage_path('/app/public/profile/profile648d6abf9ab263.53359234/Qrcode_wikipedia_fr_v2clean.png') }}" alt="no image"> --}}

                    <form action="#" id="edit-form" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="col-md-12 row" id="view-con">
                            {{-- <img src="{{ asset('storage/profile/tmp/profile64bf2341e7d979.79852656/vanrental.jpg') }}"> --}}
                            {{-- role --}}


                            {{-- <div class="mb-3">
                       <div class="d-flex justify-content-center">
                           <div class="d-grid w-50">
                               <button class="btn btn-primary">Register Driver</button>
                           </div>
                       </div>
                   </div> --}}


                            {{-- <div class="mb-3 text-center d-flex justify-content-center">
                   <div class="d-grid">
                       <span class="text-secondary">Are you looking for a driver ? <a href="{{ route('register') }}" class="text-primary "><b>Register here</b></a> </span>
                   </div>
               </div> --}}
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary' id='update'>Update</button>
                </div>
            </div>
        </div>
    </div>

@endsection
