@section('details-modal')
    <div class="modal fade modal-xl" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h1 class="modal-title fs-5 d-flex justify-content-center" id="exampleModalLabel">
                        <i class='bx bxs-user h1' ></i>
                    </h1>
                    <b><span class="h3 ml-2">DRIVER'S INFORMATION</span></b>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form method="POST" action="{{ route('login') }}"> --}}
                    <div class="modal-body row">
                        <!-- Add your login form here -->
                        
                            {{-- @csrf --}}
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-6 card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <img src="{{ asset('img/default-van-img.webp') }}" alt="Profile Image" class="img-fluid">
                                </div>
                                <div class="col-sm-6">
                                   <div class="col-sm-12 mb-3">
                                        <h5 class="border-bottom" style="width: 75%"><b>MACS VAN RENTALS</b></h5>
                                        <span class="d-flex flex-column justify-content-center align-items-center" style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Company name</b></span>
                                   </div>
                                    <div class="col-sm-12 mb-3">
                                        <h5 class="border-bottom" style="width: 75%"><b>JOHN DOE DI NALIGO</b></h5>
                                        <span class="d-flex flex-column justify-content-center align-items-center" style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Driver's name</b></span>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <h5 class="border-bottom" style="width: 75%"><b>MARIVELES, BATAAN</b></h5>
                                        <span class="d-flex flex-column justify-content-center align-items-center" style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Address</b></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4 ">
                                    <a href="{{ route('message.driver') }}" class="btn btn-info mb-2">CHAT WITH DRIVER</a>
                                    <a href="{{ route('about.driver')}}" class="btn btn-info mb-2">ABOUT DRIVER</a>
                                    <a href="#" class="btn btn-info mb-2">LOCATE DRIVER</a>
                                </div>
                                <div class="col-sm-12 mt-3">
                                   <div class="row">
                                        <div class="col-sm-6 card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <img src="{{ asset('img/default-van-img.webp') }}" alt="Profile Image" class="img-fluid">
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 style="color: rgb(2, 47, 61);"><b>DETAILS</b></h6>
                                            <div class="text-center" style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                                <div class="pt-2 me-2">
                                                    <i class='bx bxs-shopping-bags h4' style="font-size: 2em;"></i>
                                                </div>
                                                <div class="pt-2">
                                                    <div class="h6 mt-2"> <b>Bags | 8 Bags</b></div>
                                                </div>
                                            </div>
                                            <div class="text-center" style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                                <div class="pt-2 me-2">
                                                    <i class='bx bxs-user-plus h4' style="font-size: 2em;"></i>
                                                </div>
                                                <div class="pt-2">
                                                    <div class="h6 mt-2"> <b>People | 11 Setas People</b></div>
                                                </div>
                                            </div>
                                            <div class="text-center" style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                                <div class="pt-2 me-2">
                                                    <i class='bx bxs-gas-pump h4' style="font-size: 2em;"></i>
                                                </div>
                                                <div class="pt-2">
                                                    <div class="h6 mt-2"> <b>Bags | 8 Bags</b></div>
                                                </div>
                                            </div>
                                            <div class="text-center" style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                                <div class="pt-2 me-2">
                                                    <i class='bx bxs-thermometer h4' style="font-size: 2em;"></i>
                                                </div>
                                                <div class="pt-2">
                                                    <div class="h6 mt-2"> <b>Air Conditioning | Dual Zone</b></div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-5 card p-2 bg-info" >
                            {{-- <div id="calendar" style=""></div> --}}
                            <div class="wrapper mb-2">
                                <header>
                                  <p class="current-date"></p>
                                  <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                  </div>
                                </header>
                                <div class="calendar border">
                                  <ul class="weeks">
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                  </ul>
                                  <ul class="days"></ul>
                                </div>
                              </div>
                        </div>
                            
                        <div class="col-sm-12 mt-4">
                            <h4 class="text-center"><b>CUSTOMER'S FEEDBACK</b></h4>
                            <div class="row mx-auto">
                                <div class="col-sm-4">
                                  <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <div class="card-body">
                                      <h5 class="card-title"><b>User</b></h5>
                                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <div class="card-body">
                                      <h5 class="card-title"><b>User</b></h5>
                                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <div class="card-body">
                                      <h5 class="card-title"><b>User</b></h5>
                                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            
                                    </div>
                                  </div>
                                </div>
                                
                                
                              </div>
                        </div>
                        
                    </div>
                    {{-- <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-info form-control text-white">Login</button>
                        <p class="text-secondary form-control border-0">Don't have an account? <span class="text-info"><a href="#" data-bs-toggle="modal" data-bs-target="#signup-modal">Register here</a></span></p>
                    </div> --}}
                {{-- </form> --}}
            </div>
        </div>
    </div>

    <!-- JavaScript code to trigger the modal -->

@endsection
