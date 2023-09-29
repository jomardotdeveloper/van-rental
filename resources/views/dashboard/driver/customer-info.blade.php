@extends('../../dashboard.template.client-dashboard-template')

@section('title') Kyneth Esconde's Info @endsection

@section('links')
<style>
  :root {
    --theme: rgb(96, 150, 186);
    --dark-text: rgb(39, 76, 119);
    }
  .container {
      width: 100vw;
  }

  .container > :first-child {
      color: var(--dark-text);
  }

  .border-bottom-only {
    border: none;
    outline: none;
    border-bottom: 1px solid black;
    width: 100%;
    padding: 5px;
    background-color: rgb(228, 233, 240);
    color: gray;
  }
</style>  
@endsection

@section('content')
  <div class="container p-5">
    <h1 class="text-center">Customer's Information</h1>
    <div class="row justify-content-center p-3">
      <div class="col-sm-6">
        <input type="text" name="firstName" id="firstName" class="border-bottom-only" value="Kyneth" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="middleName" id="middleName" class="border-bottom-only" value="Middle Name" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="lastName" id="lastName" class="border-bottom-only" value="Esconde" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="phoneNumber" id="phoneNumber" class="border-bottom-only" value="09321923021" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="email" id="email" class="border-bottom-only" value="test@gmail.com" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="destination" id="destination" class="border-bottom-only" value="Cainta, Rizal" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="pickUpLocation" id="pickUpLocation" class="border-bottom-only" value="Brgy. Sta. Lucia Samal Bataan" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="landmark" id="landmark" class="border-bottom-only" value="Near at Ernies ice cream" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="dateOfTrip" id="dateOfTrip" class="border-bottom-only" value="April 12 2023" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="numberOfPax" id="numberOfPax" class="border-bottom-only" value="No. Of Pax" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="numberOfDays" id="numberOfDays" class="border-bottom-only" value="No. Of Days/Hours" readonly>
      </div>
      <div class="col-sm-6">
        <input type="text" name="pickUpTime" id="pickUpTime" class="border-bottom-only" value="Pickup Time" readonly>
      </div>
      <div class="text-center p-3">
        <a href="{{ route('message.customer') }}" class="btn btn-primary">Chat With Customer</a>
      </div>
    </div>
  </div>
@endsection