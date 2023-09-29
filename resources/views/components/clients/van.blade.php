@section('content')
      {{-- banner --}}
      <div class="container-fluid border banner p-4" style="width: 98%;border-radius:10px;margin-top:4.8em">
          <h4 class="text-center mb-3">UNLOCK ADVENTURE ON FOUR WHEELS WITH OUR VAN RENTAL SERVICE</h4>
          <h1 class="text-center mb-3">BATAAN VAN SERVICE</h1>
      </div>
      <div class="container-fluid border bg-light p-2 mt-1 row mx-auto" style="width: 98%;border-radius:10px">
          <div class="col-sm-3 text-success h5">
              <i class='bx bxs-check-circle'></i>
              <span>Best Available Rates</span>
          </div>
          <div class="col-sm-3 d-flex justify-content-center text-success h5" style="align-items: center">
              <i class='bx bxs-check-circle'></i>
              <span>Best Available Rates</span>
          </div>
          <div class="col-sm-3 d-flex justify-content-center text-success h5" style="align-items: center">
              <i class='bx bxs-check-circle'></i>
              <span>Best Available Rates</span>
          </div>
          <div class="col-sm-3 d-flex justify-content-end text-success h5" style="align-items: center">
              <i class='bx bxs-check-circle'></i>
              <span>Best Available Rates</span>
          </div>
      </div>
      {{-- section van  --}}
      <div class="container-fluid van-container p-0 mt-5" style="width: 98%;border-radius:10px">
          <div class="row van-row">
              <div class="col-sm-3 van-col">
                  <div class="card van-card">
                      <img src="{{ asset('img/default-van-img.webp') }}" class="card-img-top" alt="van">
                      <div class="card-body text-center">
                          <h5 class="card-title h3 mb-5">2018 TOYOTA HI-ACE VAN</h5>
                          <div class="row d-flex justify-content-center gap-1">
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-shopping-bags h1' style="font-size: 3em;"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> Bags</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 8 Bags</b></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-user-plus h1' style="font-size: 3em"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> People</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 11 Seater</b></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-8 mb-3" style="margin: auto">
                          <input class="btn btn-secondary form-control" type="button" value="View Details" data-bs-toggle="modal" data-bs-target="#details-modal">
                      </div>
                  </div>
              </div>
              <div class="col-sm-3 van-col">
                  <div class="card van-card">
                      <img src="{{ asset('img/default-van-img.webp') }}" class="card-img-top" alt="van">
                      <div class="card-body text-center">
                          <h5 class="card-title h3 mb-5">2018 TOYOTA HI-ACE VAN</h5>
                          <div class="row d-flex justify-content-center gap-1">
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-shopping-bags h1' style="font-size: 3em;"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> Bags</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 8 Bags</b></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-user-plus h1' style="font-size: 3em"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> People</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 11 Seater</b></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-8 mb-3" style="margin: auto">
                          <input class="btn btn-secondary form-control" type="button" value="View Details" data-bs-toggle="modal" data-bs-target="#details-modal">
                      </div>
                  </div>
              </div>
              <div class="col-sm-3 van-col">
                  <div class="card van-card">
                      <img src="{{ asset('img/default-van-img.webp') }}" class="card-img-top" alt="van">
                      <div class="card-body text-center">
                          <h5 class="card-title h3 mb-5">2018 TOYOTA HI-ACE VAN</h5>
                          <div class="row d-flex justify-content-center gap-1">
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-shopping-bags h1' style="font-size: 3em;"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> Bags</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 8 Bags</b></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-md-4 card"
                                  style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                  <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                      <div class="pt-2 me-2">
                                          <i class='bx bxs-user-plus h1' style="font-size: 3em"></i>
                                      </div>
                                      <div class="pt-2">
                                          <div class="text-secondary h5 mb-0"> People</div>
                                          <div style="color: rgb(2, 47, 61);"><b> 11 Seater</b></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-8 mb-3" style="margin: auto">
                          <input class="btn btn-secondary form-control" type="button" value="View Details" data-bs-toggle="modal" data-bs-target="#details-modal">
                      </div>
                  </div>
              </div>
  
  
              {{-- <div class="col-sm-4 van-col d-flex justify-content-center" style="margin-top: -5em">
                  <button class="btn btn-info text-white"><b>VIEW MORE</b></button>
              </div> --}}
          </div>
      </div>
        @endsection