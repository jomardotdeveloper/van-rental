@extends('dashboard.layouts.client-dashboard')
@section('contents')
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

            {{-- <div class="col-sm-3 van-col">
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
                        <input class="btn btn-secondary form-control details" type="button" value="View Details"
                            data-id="2">
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
                        <input class="btn btn-secondary form-control details" type="button" value="View Details"
                            data-id="6">
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
                        <input class="btn btn-secondary form-control details" type="button" value="View Details"
                            data-id="5">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @include('components.clients.modal.details')
    @yield('details-modal')

    @include('components.clients.inquire')
    @yield('inquire.form')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            checkUrl();
            console.log(localStorage.getItem('client_inquiry_details'));



            const baseUrl = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('f6459200cae7a43a20f0', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('notifaction-channel');
            channel.bind('notify-user', function(data) {
                console.log(JSON.stringify(data.data));
                getDisplayVan()
                submitBooked()
            });

            // Add a click event handler to all elements with the class "details"
            const getDriverCredentials = async (id) => {
                try {
                    $.ajax({
                        url: `/get-Driver-Credentials/${id}`, // Replace with the actual URL
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            localStorage.setItem('driver-location', JSON.stringify(data.user))
                            console.log(data)
                            $("#user_header_name").text(data.user.firstname + ' ' + data.user.lastname);
                            var profileContents = ''
                            var vehicle = ''
                            // var about = ''

                            $('.profile').attr('src',
                                `${baseUrl}/storage/profile/${data.user.documents[0].path}`)
                            profileContents = `
                                <br/>
                                <div class="col-sm-12 mb-3 driver-contents">
                                    <h5 class="border-bottom"><b>${data.user.vans[0].companyname}</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Company name</b></span>
                                </div>
                                <div class="col-sm-12 mb-3 driver-contents">
                                    <h5 class="border-bottom"><b>${data.user.firstname} ${data.user.lastname} ${data.user.middlename}</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Driver's name</b></span>
                                </div>
                                <div class="col-sm-12 mb-3 driver-contents">
                                    <h5 class="border-bottom"><b>${data.user.street}, ${data.user.municipality}</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Address</b></span>
                                </div>
                        `
                            vehicle = `<div class="col-sm-6 card vehicle-card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 2px 5px;">
                                        <img src="${baseUrl}/storage/vehicle/${data.user.documents[1].path}" alt="Profile Image"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-sm-6 mt-2 vehicle-contents">
                                        <h6 style="color: rgb(2, 47, 61);"><b>DETAILS</b></h6>
                                        <div class="text-center"
                                            style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                            <div class="me-2">
                                                <i class='bx bxs-car-garage h4' style="font-size: 2em;"></i>
                                            </div>
                                            <div>
                                                <div class="h6 mt-1"> <b>Model | ${data.user.vans[0].model}</b></div>
                                            </div>
                                        </div>
                                        <div class="text-center"
                                            style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                            <div class="me-2">
                                                <i class='bx bxs-shopping-bags h4' style="font-size: 2em;"></i>
                                            </div>
                                            <div>
                                                <div class="h6 mt-1"> <b>Bags | ${data.user.vans[0].bag} Bags</b></div>
                                            </div>
                                        </div>
                                        <div class="text-center"
                                            style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                            <div class="me-2">
                                                <i class='bx bxs-user-plus h4' style="font-size: 2em;"></i>
                                            </div>
                                            <div>
                                                <div class="h6 mt-1"> <b>People | ${data.user.vans[0].seat} Setas People</b></div>
                                            </div>
                                        </div>
                                        <div class="text-center"
                                            style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                            <div class="me-2">
                                                <i class='bx bxs-gas-pump h4' style="font-size: 2em;"></i>
                                            </div>
                                            <div>
                                                <div class="h6 mt-1"> <b>Bags | ${data.user.vans[0].bag} Bags</b></div>
                                            </div>
                                        </div>
                                        <div class="text-center"
                                            style="display: flex; align-items:start;justify-content:start;color: rgb(2, 47, 61);">
                                            <div class="me-2">
                                                <i class='bx bxs-thermometer h4' style="font-size: 2em;"></i>
                                            </div>
                                            <div>
                                                <div class="h6 mt-1"> <b>Air Conditioning | ${data.user.vans[0].ac} Zone</b></div>
                                            </div>
                                        </div>
                                    </div>`


                            $('.profile-contents').html(profileContents)
                            $('#vehicle-info').html(vehicle)
                            // $('#about-page').html(about)
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching driver coordinates:', error);
                            // Remove 'driver-location' data from localStorage
                            localStorage.removeItem('driver-location');
                            $('.profile').attr('src', `${baseUrl}/storage/default/profile.png`)
                            profileContents = `
                                <div class="col-sm-12 mb-3">
                                    <h5 class="border-bottom"><b>Not Available</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Company name</b></span>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <h5 class="border-bottom"><b>Not Available</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Driver's name</b></span>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <h5 class="border-bottom"><b>Not Available</b></h5>
                                    <span class="d-flex flex-column justify-content-center align-items-center"
                                        style="margin-top: -10px;color: rgb(2, 47, 61);"><b>Address</b></span>
                                </div>
                        `
                            $('.profile-contents').html(profileContents)
                        }
                    });
                } catch (error) {
                    console.log(error)
                }
            }

            const getCalendarDays = async (id) => {
                const curDate = $('.current-date').text()
                const dataInLocal = JSON.parse(localStorage.getItem(
                    'driver-location')); // Default to an empty array if localStorage is empty
                console.log('dwadwadwa')
                console.log(dataInLocal.bookeds)
                if (dataInLocal.bookeds.length > 0) {
                    dataInLocal.bookeds.forEach(day => {
                        // console.log(day.dateoftrip)
                        let targetDate = new Date(day.dateoftrip);
                        let dayOfMonth = targetDate.getDate();

                        console.log(dayOfMonth)
                        // console.log(curDate)
                        $('li.d').each(function(index, element) {
                            const dayText = $(element).text();

                            // alert(actDay.text())
                            // Check if the element has the 'inactive' class
                            if ($(element).hasClass('inactive')) {
                                // If the element has the 'inactive' class, ignore it and do not add the click event
                                console.log('Ignoring inactive day:', dayText);
                                return; // Skip this iteration and proceed to the next li element
                            } else if (dayOfMonth > parseInt($(element)
                                    .text(), 10)) {
                                $(element).addClass('not-available text-danger').attr({
                                    'data-bs-toggle': 'tooltip',
                                    'data-bs-placement': 'top',
                                    "data-bs-custom-class": "custom-tooltip",
                                    'data-bs-title': "You can't select the day that already passed by. "
                                });

                            } else if ($(element).hasClass('active-booked')) {
                                $(element).attr({
                                    'data-bs-toggle': 'tooltip',
                                    'data-bs-placement': 'top',
                                    "data-bs-custom-class": "custom-tooltip",
                                    'data-bs-title': "Someone already booked on this day. "
                                });
                            } else {
                                $(element).addClass('available')
                            }

                            if (dayText == dayOfMonth && day.status == 'pending') {
                                $(element).addClass('active-pending')
                            }

                            if (dayText == dayOfMonth && day.status == 'accepted') {
                                // $(element).removeClass('active')
                                $(element).addClass('active-booked')
                            }

                            // Initialize tooltips for all elements with [data-bs-toggle="tooltip"]
                            $('[data-bs-toggle="tooltip"]').tooltip();
                            var tooltipTimeout; // Declare the tooltipTimeout variable
                            $(element).on('click', () => {

                                if ($(element).hasClass('inactive') || $(element)
                                    .hasClass('not-available')) {
                                    // Clear the existing timeout
                                    if (tooltipTimeout) {
                                        clearTimeout(tooltipTimeout);
                                    }
                                    // Set a new timeout to hide the tooltip after 5 seconds
                                    tooltipTimeout = setTimeout(function() {
                                        $('[data-bs-toggle="tooltip"]')
                                            .tooltip('hide');
                                    }, 5000);
                                    // alert('this day is not accepting any booking! ')
                                } else if ($(element)
                                    .hasClass('active-booked')) {

                                    // alert('this day is already booked!')
                                } else {
                                    $("#inquiry").modal({
                                        backdrop: "static",
                                        keyboard: false, // Optional: Disable closing the modal with the keyboard
                                    });
                                    // Show the element with ID "details"
                                    // Show the element with ID "details"
                                    $('#details').modal('hide');
                                    $('#inquiry').modal('show');

                                    const date_object = new Date($(element).text() +
                                        curDate);
                                    // const options = { day: "numeric", month: "long", year: "numeric" };
                                    // const formatted_date = date_object.toLocaleDateString("en-US", options);
                                    // console.log(formatted_date);  // Output: August 4, 2023

                                    const month = (date_object.getMonth() + 1)
                                        .toString()
                                        .padStart(2,
                                            "0");
                                    const day = date_object.getDate().toString()
                                        .padStart(2,
                                            "0");
                                    const year = date_object.getFullYear();

                                    const formatted_date =
                                        `${year}-${month}-${day}`;
                                    console.log(formatted_date)

                                    $(document).ready(function() {
                                        // initialize form
                                        $("#dateoftrip").val(
                                            formatted_date);
                                        $('#driver-id').val(id)
                                    });
                                }


                            })
                        });
                    });
                } else {
                    $('li.d').each(function(index, element) {
                        const dayText = $(element).text();

                        // Check if the element has the 'inactive' class
                        if ($(element).hasClass('inactive')) {
                            // If the element has the 'inactive' class, ignore it and do not add the click event
                            console.log('Ignoring inactive day:', dayText);
                            return; // Skip this iteration and proceed to the next li element
                        }

                        // if (dayText == dayOfMonth && day.status == 'pending') {
                        $(element).removeClass('active-pending')
                        // }

                        // if (dayText == dayOfMonth && day.status == 'accepted') {
                        $(element).removeClass('active-booked')
                        // }


                        $(element).on('click', () => {
                            // alert('dwadwa')
                            $("#inquiry").modal({
                                backdrop: "static",
                                keyboard: false, // Optional: Disable closing the modal with the keyboard
                            });
                            // Show the element with ID "details"
                            // Show the element with ID "details"
                            $('#details').modal('hide');
                            $('#inquiry').modal('show');

                            const date_object = new Date($(element).text() +
                                curDate);
                            // const options = { day: "numeric", month: "long", year: "numeric" };
                            // const formatted_date = date_object.toLocaleDateString("en-US", options);
                            // console.log(formatted_date);  // Output: August 4, 2023

                            const month = (date_object.getMonth() + 1).toString()
                                .padStart(2,
                                    "0");
                            const day = date_object.getDate().toString().padStart(2,
                                "0");
                            const year = date_object.getFullYear();

                            const formatted_date = `${year}-${month}-${day}`;
                            console.log(formatted_date)

                            $(document).ready(function() {
                                // initialize form
                                $("#dateoftrip").val(formatted_date);
                                $('#driver-id').val(id)
                            });

                        })
                    });
                }

            }

            const back = async () => {
                $('#back').on('click', () => {
                    // Show the element with ID "details"
                    $('#inquiry').modal('hide');
                    // Show the element with ID "details"
                    $('#details').modal('show');
                })
            }

            /*-create the payment link
              -store the form to the localStorage
              -open the payment link
              -then check if the */
            const submitBooked = async () => {
                $('#submit-form').on('click', (event) => {
                    event.preventDefault();
                    let payment = 1000;
                    $.ajax({
                        url: '/payment_process',
                        data: {
                            amount:payment //replace with the actual amount
                        },
                        beforeSend:function(){
                            document.getElementById('submit-form').disabled = true;
                        },
                        success: function(result) {

                            console.log(result);
                            //store the items first to the localstorage
                            localStorage.setItem('client_inquiry_details',JSON.stringify(form_to_object('#form-inquiry')));
                            location.replace(result.url);
                            ;
                            //checkout the order after the payment has succeed
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })

                    /*$.ajax({
                        url: `/post-Client-Booked`, // Replace with the actual URL
                        method: 'POST',
                        dataType: 'json',
                        data: $('#form-inquiry').serialize(),
                        success: function(data) {
                            console.log(data)
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })*/
                })
            }

            const getDisplayVan = async () => {
                try {
                    $.ajax({
                        url: `/get-Van-Display`, // Replace with the actual URL
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            var html = ''

                            data.forEach(van => {
                                const maintenanceEntries = van.user.maintenances;
                                const hasMaintenance = maintenanceEntries.some(
                                    maintenance => maintenance.status ===
                                    'maintenance');

                                const badgeClass = hasMaintenance ? 'text-bg-warning' :
                                    'primary-bg';
                                const badgeText = hasMaintenance ?
                                    'Maintenance Repair !' : 'Book Now';
                                const buttonClass = hasMaintenance ? 'disabled' : '';
                                const vanCard = `<div class="col-sm-3 mb-3 van-col">
                                    <div class="card van-card position-relative">
                                        <span class="position-absolute top-10 end-0  p-2 ${badgeClass} border border-light">
                                            <span>${badgeText}!</span>
                                        </span>
                                        <img src="${baseUrl}/storage/vehicle/${van.user.documents[1].path}" class="card-img-top" alt="van">
                                        <div class="card-body text-center primary-color">
                                            <h5 class="card-title h3 mb-5">${van.model}</h5>
                                            <div class="row d-flex justify-content-center gap-1">
                                                <div class="col-lg-4 col-md-4 card welcome-bags-card primary-color">
                                                    <div class="text-center welcome-card-text">
                                                        <div class="pt-2 me-2">
                                                            <i class='bx bxs-shopping-bags h1' style="font-size: 2em;"></i>
                                                        </div>
                                                        <div class="pt-2 welcome-bags-card-text primary-color">
                                                            <div class="h5 mb-0"> Bags</div>
                                                            <div><b> ${van.bag} Bags</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 card welcome-people-card primary-color">
                                                    <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                                        <div class="pt-2 me-2">
                                                            <i class='bx bxs-user-plus h1' style="font-size: 2em"></i>
                                                        </div>
                                                        <div class="pt-2 welcome-people-card-text primary-color">
                                                            <div class="h5 mb-0"> People</div>
                                                            <div><b> ${van.seat} Seater</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 mb-3" style="margin: auto">
                                            <input class="btn btn-secondary form-control details ${buttonClass}" type="button" value="View Details" data-id="${van.user_id}">
                                        </div>
                                    </div>
                                </div>
                                `
                                // const vanCard = `
                                //     <div class="col-sm-3 mb-3 van-col">
                                //         <div class="card van-card position-relative">

                                //             <span class="badge position-absolute top-0 end-0 p-3 ${badgeClass}">${badgeText}</span>
                                //             <img src="${baseUrl}/storage/vehicle/${van.user.documents[1].path}" class="card-img-top" alt="van">
                                //             <div class="card-body text-center primary-color">
                                //                 <h5 class="card-title h3 mb-5">${van.model}</h5>
                                //                 <!-- Other card body content -->
                                //                 <div class="row d-flex justify-content-center gap-1">
                                //                                             <div class="col-lg-4 col-md-4 card welcome-bags-card primary-color">
                                //                                                 <div class="text-center welcome-card-text">
                                //                                                     <div class="pt-2 me-2">
                                //                                                         <i class='bx bxs-shopping-bags h1' style="font-size: 3em;"></i>
                                //                                                     </div>
                                //                                                     <div class="pt-2">
                                //                                                         <div class="text-secondary h5 mb-0"> Bags</div>
                                //                                                         <div style="color: rgb(2, 47, 61);"><b> ${van.bag} Bags</b></div>
                                //                                                     </div>
                                //                                                 </div>
                                //                                             </div>
                                //                                             <div class="col-lg-4 col-md-4 card"
                                //                                                 style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                //                                                 <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                                //                                                     <div class="pt-2 me-2">
                                //                                                         <i class='bx bxs-user-plus h1' style="font-size: 3em"></i>
                                //                                                     </div>
                                //                                                     <div class="pt-2">
                                //                                                         <div class="text-secondary h5 mb-0"> People</div>
                                //                                                         <div style="color: rgb(2, 47, 61);"><b> ${van.seat} Seater</b></div>
                                //                                                     </div>
                                //                                                 </div>
                                //                                             </div>
                                //                                         </div>
                                //             </div>
                                //             <div class="col-sm-8 mb-3" style="margin: auto">
                                //                 <input class="btn btn-secondary form-control details ${buttonClass}"
                                //                     type="button" value="View Details" data-id="${van.user_id}"
                                //                     ${buttonClass}>
                                //             </div>
                                //         </div>
                                //     </div>
                                // `;

                                html += vanCard;
                                // const maintenanceBadge = van.user.maintenances[0]
                                //     .status === 'maintenance' ?
                                //     `<span class="badge position-absolute top-0 end-0 p-3 text-bg-warning">Maintenance Repair</span>` :
                                //     '<span class="badge position-absolute top-0 end-0 p-3 text-bg-success">Booked Now</span>';
                                // html += `
                            // <div class="col-sm-3 van-col">

                            //     <div class="card van-card">
                            //         <span class="badge position-absolute top-0 end-0 p-3 ${van.user.maintenances[0]?.status === 'maintenance' ? 'text-bg-warning' : 'text-bg-success'}">${van.user.maintenances[0]?.status === 'maintenance' ? 'Maintenance Repair !' : 'Book Now !'}</span>
                            //         <img src="${baseUrl}/storage/vehicle/${van.user.documents[1].path}" class="card-img-top" alt="van">
                            //         <div class="card-body text-center">
                            //             <h5 class="card-title h3 mb-5">${van.model}</h5>
                            //             <div class="row d-flex justify-content-center gap-1">
                            //                 <div class="col-lg-4 col-md-4 card"
                            //                     style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            //                     <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                            //                         <div class="pt-2 me-2">
                            //                             <i class='bx bxs-shopping-bags h1' style="font-size: 3em;"></i>
                            //                         </div>
                            //                         <div class="pt-2">
                            //                             <div class="text-secondary h5 mb-0"> Bags</div>
                            //                             <div style="color: rgb(2, 47, 61);"><b> ${van.bag} Bags</b></div>
                            //                         </div>
                            //                     </div>
                            //                 </div>
                            //                 <div class="col-lg-4 col-md-4 card"
                            //                     style="width: 40%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            //                     <div class="text-center" style="display: flex; align-items:center;justify-content:center">
                            //                         <div class="pt-2 me-2">
                            //                             <i class='bx bxs-user-plus h1' style="font-size: 3em"></i>
                            //                         </div>
                            //                         <div class="pt-2">
                            //                             <div class="text-secondary h5 mb-0"> People</div>
                            //                             <div style="color: rgb(2, 47, 61);"><b> ${van.seat} Seater</b></div>
                            //                         </div>
                            //                     </div>
                            //                 </div>
                            //             </div>
                            //         </div>
                            //         <div class="col-sm-8 mb-3" style="margin: auto">
                            //             <input class="btn btn-secondary form-control details ${van.user.maintenances[0]?.status === 'maintenance' ? 'disabled' : ''}"
                            //             type="button" value="View Details" data-id="${van.user_id}"
                            //             ${van.user.maintenances[0]?.status === 'maintenance' ? 'disabled' : ''}>
                            //         </div>
                            //     </div>
                            // </div>
                            // `
                            });

                            $('.van-row').html(html)
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching driver coordinates:', error);
                        }
                    });
                } catch (error) {
                    console.log(error)
                }
            }

            getDisplayVan()
            submitBooked()

            $(document).on('click', '.details', function() {
                // Get the data-id attribute of the clicked element
                var dataId = $(this).data('id');

                // Log the data-id to the console
                console.log(dataId);
                $('#chat-driver').attr('value', dataId)
                // alert("sample");

                $("#details").modal({
                    backdrop: "static",
                    keyboard: false, // Optional: Disable closing the modal with the keyboard
                });
                // Show the element with ID "details"
                $('#details').modal('show');

                // Set the data-id attribute of the modal with the clicked element's data-id value
                $('#details').attr('data-id', dataId);
                getDriverCredentials(dataId)
                getCalendarDays(dataId)
                // getDisplayVan()
                back()
            });

            //function to convert the form data to an object

            function form_to_object(name){
                const serializedFormData = $(name).serialize(); // Serialize the form data
                const formDataObject = {};

                // Split the serialized string by '&' and iterate over key-value pairs
                serializedFormData.split("&").forEach(function (pair) {
                  const keyValue = pair.split("=");
                  const key = decodeURIComponent(keyValue[0]); // Decode the key
                  const value = decodeURIComponent(keyValue[1]); // Decode the value
                  formDataObject[key] = value; // Create key-value pair in the object
                });

                return formDataObject;
            }

            //function to test if a variable is avialable on the url
            function found_on_url(name){
                // Get the query string portion of the URL
              const queryString = window.location.search;

              // Create a regular expression to match the variable in the query string
              const regex = new RegExp('[?&]' + name + '(=|&|$)', 'i');

              // Test if the regex matches the query string
              return regex.test(queryString);
            }

            //check if the payment has been made
            //if true process the placement order of the client
            function checkUrl(){
                if(found_on_url('amount') && found_on_url('currency') && found_on_url('referenceId') && found_on_url('paymentlinkId') && found_on_url('paymentId')){

                    let item = JSON.parse(localStorage.getItem('client_inquiry_details'));
                    localStorage.setItem('client_inquiry_details',null);
                    $.ajax({
                        url: `/post-Client-Booked`, // Replace with the actual URL
                        data: {
                            item:item

                        },
                        success: function(data) {
                            alert('order processed');
                            console.log(data)
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                }
            }
        });
    </script>
@endsection
