@extends('../../dashboard.template.client-dashboard-template')

@section('title') Customer's Info @endsection

@section('links')
<style>
  :root {
    --theme: rgb(96, 150, 186);
    --dark-text: rgb(39, 76, 119);
  }
  .container {
    height: 100vh;
  }

  .services-btn {
    padding: 8px 12px;
    border: 1px solid var(--dark-text);
    color: var(--dark-text);
    background-color: whitesmoke;
    border-radius: 20px;
  }
</style>
@endsection

@section('content')
<div class="container d-flex justify-content-center p-3">
  <div class="w-50">
    <div class="title text-center h1">Add your services</div>
    <form action="">
      <div class="form-group p-2">
        <input type="text" name="fullName" class="form-control shadow-sm rounded" placeholder="Full Name" required>
      </div>
      <div class="form-group p-2">
        <input type="text" name="companyName" class="form-control shadow-sm rounded" placeholder="Company Name" required>
      </div>
      <div class="form-group p-2">
        <input type="text" name="address" class="form-control shadow-sm rounded" placeholder="Address" required>
      </div>
      <div class="form-group p-2">
        <input type="text" name="vehicleModel" class="form-control shadow-sm rounded" placeholder="Model Of Vehicle" required>
      </div>
      <div class="form-group p-2">
        <input type="text" name="vehiclePhoto" class="form-control shadow-sm rounded" onfocus="(this.type='file')" placeholder="Upload vehicle picture here" required>
      </div>
      <div class="p-2">
        <div class="title text-center h5">Vehicle Specifications</div>
      </div>
      <div class="form-group row justify-content-center">
        <div class="col-sm-5 p-2">
          <input type="text" name="numberOfBags" class="form-control shadow-sm rounded" placeholder="No. Of Bags">
        </div>
        <div class="col-sm-5 p-2">
          <input type="text" name="numberOfSeats" class="form-control shadow-sm rounded" placeholder="No. Of Seats">
        </div>
        <div class="col-sm-5 p-2">
          <input type="text" name="airconType" class="form-control shadow-sm rounded" placeholder="Aircon Type">
        </div>
        <div class="col-sm-5 p-2">
          <input type="text" name="fuelType" class="form-control shadow-sm rounded" placeholder="Fuel Type">
        </div>
      </div>
      <div class="text-center p-3">
        <button class="services-btn">Add your services</button>
      </div>
    </form>
  </div>
</div>
@endsection