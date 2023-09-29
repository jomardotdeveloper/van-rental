@extends('../../dashboard.template.client-dashboard-template')

@section('title')
    About Driver
@endsection

@section('links')
    <style>
        :root {
            --theme: rgb(96, 150, 186);
            --dark-text: rgb(39, 76, 119);
        }

        .container {
            height: 100vh;
        }

        .driver-info-container>.info-title,
        .service-offered-container>.info-title {
            font-size: 2.5rem;
            font-weight: 400;
            text-transform: uppercase;
            color: var(--dark-text);
        }

        .driver-info-container>.driver-information {
            font-size: 1.3rem;
            font-weight: 400;
            color: var(--dark-text);
        }

        .driver-information> :first-child {
            border-right: 1px solid black;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, 350px);
            gap: 20px;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .card-container>.card {
            border: 2px solid var(--dark-text);
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="driver-info-container p-3">
                    <div class="info-title col text-center">Drivers Information</div>
                    <div class="driver-information row p-5">
                        <div class="col d-flex justify-content-center align-items-center p-0">
                            <div>
                                <p>Company Name: <span id="company-name">Macs Van Rentals</span></p>
                                <p>Name: <span id="driver-name">John Doe Di Naligo</span></p>
                                <p>Age: <span id="driver-age">40</span></p>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-items-center p-0">
                            <div>
                                <p>Address: <span id="driver-address">Mariveles, Bataan</span></p>
                                <p>Contact Number: <span id="driver-contact">09342123412</span></p>
                                <p>Email: <span id="driver-email">johndoewalangligo@gmail.com</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <h5 id="secondary-content" class="card-title">Tagaytay, Laguna, Cavite, Enchanted Kingdom,
                                Splash Island, Pansol</h5>
                            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 7,000
                                overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Antipolo, Baras, Binangonan, Montalban, San Mateo
                                (9 Waves Resort), Tanay, Taytay</h5>
                            <p class="card-text">PHP 4,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 7,000
                                overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Bataan, Subic, Batangas, Tarlac, Nueva Ecija</h5>
                            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 8,000
                                overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Bulacan, Pampanga</h5>
                            <p class="card-text">PHP 4,500 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 8,000
                                overnightExcluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Zambales, Quezon</h5>
                            <p class="card-text">PHP 5,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 9,500
                                overnight (24 hours)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Panggasinan</h5>
                            <p class="card-text">PHP 6,000 day tour (PHP 300.00 per hour in excess of 8 hours)PHP 11,000
                                overnight (24 hours)PHP 11,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days) PHP 28,000 (5
                                days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Baguio, La Union</h5>
                            <p class="card-text">PHP 9,500 (overnight)PHP 10,000 (2 days)PHP 14,500 (3 days) PHP 19,000 (4
                                days)PHP 24,000 (5 days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Pagudpud, Ilocos, Cagayan Valley, Camarines,
                                Sagada</h5>
                            <p class="card-text">PHP 12,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days)PHP 29,000 (5
                                days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 id="secondary-content" class="card-title">Bicol Region </h5>
                            <p class="card-text">PHP 12,000 (2 days)PHP 17,000 (3 days)PHP 23,000 (4 days)PHP 29,000 (5
                                days)Excluded: Diesel/Parking fee/Toll fee/Driver's meals</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center d-flex justify-content-center p-5">
                    <div class="d-grid">
                        <a id="name" href="{{ asset('inquiry') }}" class="text-white btn btn-info"><b>INQUIRE
                                NOW</b></a>
                    </div>
                </div>
                <div class="terms-and-conditions-container p-5">
                    <div class="terms-and-conditions d-flex flex-column align-items-center justify-content-center gap-5">
                        <h1>TERMS AND CONDITIONS:</h1>
                        <ul>
                            <li>ROUND TRIP VAN TRANSFER MANILA TO ANY POINT AND VICE VERSA</li>
                            <li>MAXIMUM OF 14 CAPACITY</li>
                            <li>VAN WILL LEAVE AT GARAGE FULL TANK AND REPLENISH ONLY THE FUEL USED BEFORE DROP OFF</li>
                            <li>TIME STARTS AT PICK UP POINT AND ENDS UP AT DROP OFF</li>
                            <li>SUCCEEDING HOURS WILL BE CHARGE P300 PER HOUR</li>
                            <li>SUCCEEDING HOURS WILL BE CHARGE P300 PER HOUR</li>
                            <li>REMAINING BALANCE TO BE PAID UPON PICK UP</li>
                            <li>DRIVER'S ACCOMODATION SHOULDERED BY RENTER IF STAY OVERNIGHT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
