@extends('dashboard.layouts.client-dashboard')
@section('links')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
   <style>
        .container{
            margin-top:8rem;    
        }
        .container .row .card img{
            width: 40px;
            height: 40px;
        }

        #map{
            height: 180px;
            height: 400px
        }
        @media only screen and (min-width: 300px)  {
            .container .row .card ul li.nav-item{
                width: 100px;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px
            }
            .container .row .card ul li.nav-item .bx{
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px
            }
        }
   </style>
@endsection
@section('contents')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('client-dash') }}" class="bx bx-left-arrow-alt" style="text-decoration: none;font-size:24px;"></a>
                    <img id="profile" src="https://www.pngall.com/wp-content/uploads/5/Profile-Male-PNG.png" class="img-fluid rounded-start" alt="profile">
                    <span id="name" ><b>Jhon Doe Location's</b></span>
                </div>
                <div class="card-body">
                    <div id="map"></div>
                </div>
                <ul class="d-flex flex-wrap mb-2 row border list-unstyled">
                    <li class="nav-item col-sm-3 flex-fill mx-auto">
                        <a class="nav-link active" aria-current="page" href="{{ route('client-dash') }}">
                            <span class="bx bxs-home"></span>
                            <span class="mx-2">Details</span>
                        </a>
                    </li>
                    <li class="nav-item col-sm-3 flex-fill mx-auto">
                        <a class="nav-link" href="{{ route('client-dash-services') }}">
                            <span class="bx bxs-wrench"></span>
                            <span class="mx-2">Chat</span>
                        </a>
                    </li>
                    <li class="nav-item col-sm-3 flex-fill mx-auto">
                        <a class="nav-link" href="{{ route('client-dash-location') }}">
                            <span class="bx bxs-map"></span>
                            <span class="mx-2">About</span>
                        </a>
                    </li>
                </ul>
                
                
                
              </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
       const baseUrls = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;
        // Fetch driver coordinates from localStorage
    function getDriverLocation() {
        let driverCredentials = JSON.parse(localStorage.getItem('driver-location'));

        if (driverCredentials !== null && 'latitude' in driverCredentials.locations[0] && 'longitude' in driverCredentials.locations[0]) {
            // Create the map and set the initial view
            var map = L.map('map').setView([driverCredentials.locations[0].latitude, driverCredentials.locations[0].longitude], 12);

            // Add the OpenStreetMap tile layer
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Create a marker at the specified coordinates
            var marker = L.marker([driverCredentials.locations[0].latitude, driverCredentials.locations[0].longitude]).addTo(map);

            // Add a circle with a specific radius around the marker
            var circle = L.circle([driverCredentials.locations[0].latitude, driverCredentials.locations[0].longitude], {
                radius: 1000, // in meters
                color: 'blue', // circle color
                fillOpacity: 0.2 // circle fill opacity
            }).addTo(map);

            // Add a tooltip to the marker
            marker.bindTooltip('Driver is located here.').openTooltip();
            const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
            const matches = driverCredentials.documents && driverCredentials.documents[0] && driverCredentials.documents[0].path && regex.test(driverCredentials.documents[0].path) ? driverCredentials.documents[0].path : 'profile.png';
            let extPath =  driverCredentials.documents[0] ? "profile" : "default";
            $('#profile').attr('src',`${baseUrls}/storage/${extPath}/${matches}`)
            $('#name').html(`<b>${driverCredentials.vans[0].fullname} Location's</b>`)
        } else {
            // Show a message or fallback content when data is not available
            document.getElementById('map').innerHTML = '<p>No driver location data available.</p>';
        }
    }

   
        // Call the function to fetch and update driver coordinates
        getDriverLocation();
    </script>
@endsection