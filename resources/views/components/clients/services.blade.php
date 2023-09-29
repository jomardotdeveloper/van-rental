@extends('dashboard.layouts.client-dashboard')
{{-- @extends('../../dashboard.template.client-dashboard-template') --}}

@section('title') About @endsection

@section('links')
<style>
  :root {
    --theme: rgb(96, 150, 186);
    --dark-text: rgb(39, 76, 119);
}

.info-title {
  font-size: 2.5rem;
  font-weight: 400;
  text-transform: uppercase;
  color: var(--dark-text);
}
.card-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, 400px);
  gap: 20px;
  justify-content: center;
  align-items: center;
  padding: 10px;
}

.card-container > .card {
  border: 2px solid var(--dark-text);
  width: 100%;
  height: 100%;
}
</style>
@endsection

@section('contents')
<div class="row">
      <div class="service-offered-container p-3">
        <div class="info-title col text-center">Service Offered</div>
          <div class="col-md-12 mt-5 text-center">
            <h4 id="secondary">ALL-OUT ROUNDTRIPS. (VAN AND DRIVER ONLY)</h4>
            <h5 id="secondary">OUT OF TOWN RATES</h5>
        </div>
      </div>
      <div class="card-container">
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Tagaytay, Laguna, Cavite, Enchanted Kingdom, Splash Island, Pansol</h5>
            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 7,000 overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Antipolo, Baras, Binangonan, Montalban, San Mateo (9 Waves Resort), Tanay, Taytay</h5>
            <p class="card-text">PHP 4,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 7,000 overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Bataan, Subic, Batangas, Tarlac, Nueva Ecija</h5>
            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 8,000 overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Bulacan, Pampanga</h5>
            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 8,000 overnightExcluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Zambales, Quezon</h5>
            <p class="card-text">PHP 5,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 9,500 overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Panggasinan</h5>
            <p class="card-text">PHP 6,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 11,000 overnight (24 hours)PHP 11,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days) PHP 28,000 (5 days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Baguio, La Union</h5>
            <p class="card-text">PHP 9,500 (overnight)PHP 10,000 (2 days)PHP 14,500 (3 days) PHP 19,000 (4 days)PHP 24,000 (5 days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Pagudpud, Ilocos, Cagayan Valley, Camarines, Sagada</h5>
            <p class="card-text">PHP 12,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days)PHP 29,000 (5 days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 id="secondary-content" class="card-title">Bicol Region </h5>
            <p class="card-text">PHP 12,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days)PHP 29,000 (5 days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
          </div>
        </div>
      </div>
@endsection