<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.drivers.head.head')
    @yield('header')
    @yield('links')
    {{-- driver side chat --}}
    <style>
        :root{
            --white: #fff;
            --primary-color-light: #F6F5FF;
            --primary-color: #6096ba;
            --secondary-color: #274c77;
            --tertiary-color: #33ab63;
            --last-color: #e74a4a;
            --primary-color-support: rgb(2, 47, 61);
            --primary-font: Arial, Helvetica, sans-serif;
        }
        #chat-customer {
            width: 35%;
            /* height: fit-content; */
        }

        .wrappers {
            margin: auto;
            background: var(--white);
            max-width: inherit;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 var(--secondary-color),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        /* Chat Area CSS Start */
        .chat-area header {
            display: flex;
            align-items: center;
            padding: 18px 30px;
        }

        .chat-area header .back-icon {
            color: #333;
            font-size: 18px;
        }

        .chat-area header img {
            height: 45px;
            width: 45px;
            margin: 0 15px;
        }

        .chat-area header .details span {
            font-size: 17px;
            font-weight: 500;
        }

        .chat-box {
            position: relative;
            min-height: 500px;
            max-height: 500px;
            overflow-y: auto;
            padding: 10px 30px 20px 30px;
            background: var(--white);
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
        }

        .chat-box .text {
            position: absolute;
            top: 45%;
            left: 50%;
            width: calc(100% - 50px);
            text-align: center;
            transform: translate(-50%, -50%);
        }

        .chat-box .chat {
            margin: 15px 0;
        }

        .chat-box .chat p {
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0rem 16px 16px -16px rgb(0 0 0 / 10%);
        }

        .chat-box .outgoing {
            display: flex;
        }

        .chat-box .outgoing .details {
            margin-left: auto;
            max-width: calc(100% - 130px);
        }

        .outgoing .details p {
            background: var(--secondary-color);
            color: #fff;
            border-radius: 18px 18px 0 18px;
        }

        .chat-box .incoming {
            display: flex;
            align-items: flex-end;
        }

        .chat-box .incoming img {
            height: 35px;
            width: 35px;
        }

        .chat-box .incoming .details {
            margin-right: auto;
            margin-left: 10px;
            max-width: calc(100% - 130px);
        }

        .incoming .details p {
            background: #fff;
            color: var(--secondary-color);
            border-radius: 18px 18px 18px 0;
        }

        .typing-area {
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
        }

        .typing-area input {
            height: 45px;
            width: calc(100% - 58px);
            font-size: 16px;
            padding: 0 13px;
            border: 1px solid var(--secondary-color);
            outline: none;
            border-radius: 5px 0 0 5px;
        }

        .typing-area button {
            color: #fff;
            width: 55px;
            border: none;
            outline: none;
            background: var(--secondary-color);
            font-size: 19px;
            cursor: pointer;
            opacity: 0.9;
            pointer-events: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s ease;
        }

        .typing-area button.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* Responive media query */
        @media screen and (max-width: 500px) {
            /* .form, .users{
          padding: 20px;
        }
        .form header{
          text-align: center;
        }
        .form form .name-details{
          flex-direction: column;
        }
        .form .name-details .field:first-child{
          margin-right: 0px;
        }
        .form .name-details .field:last-child{
          margin-left: 0px;
        }

        .users header img{
          height: 45px;
          width: 45px;
        }
        .users header .logout{
          padding: 6px 10px;
          font-size: 16px;
        }
        :is(.users, .users-list) .content .details{
          margin-left: 15px;
        }

        .users-list a{
          padding-right: 10px;
        } */

            .chat-area header {
                padding: 15px 20px;
            }

            .chat-box {
                min-height: 400px;
                padding: 10px 15px 15px 20px;
            }

            .chat-box .chat p {
                font-size: 15px;
            }

            .chat-box .outogoing .details {
                max-width: 230px;
            }

            .chat-box .incoming .details {
                max-width: 265px;
            }

            .incoming .details img {
                height: 30px;
                width: 30px;
            }

            .chat-area form {
                padding: 20px;
            }

            .chat-area form input {
                height: 40px;
                width: calc(100% - 48px);
            }

            .chat-area form button {
                width: 45px;
            }

            .wrappers {
                padding: 0px 0px 0px 0px;
                max-width: 100%;

                border: 1px solid var(--secondary-color);
            }

            #chat-customer {
                /* background: red; */
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('components.navigation.nav')
    <div class="main-wrapper">
        @yield('navigation')
        {{-- <div class="page-wrapper"> --}}

        {{-- @include('components.drivers.home') --}}
        @include('components.drivers.vehicle-registration')
        {{-- @include('components.drivers.all-booked') --}}


        {{-- @yield('driver-home') --}}
        @yield('vehicle-registration')

        <section class="home">

            <nav class="navbar bg-body-tertiary" id="head-nav" style="width: 100%;">
                <div class="container-fluid">
                    <a class="navbar-brand mx-5 text-color-dark secondary-color" href="#">Bataan Van Rental Services</a>
                    <input class="form-control driver-id" type="hidden" name="driver-id"
                        value="{{ auth()->user()->id }}">
                    <div class="d-flex">
                        {{-- <a type="button" class="text-color-dark position-relative" data-bs-toggle="offcanvas"
                            data-bs-target="#guidelines" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class='bx bx-info-circle h4 secondary-color'>

                            </span>

                        </a> --}}

                        <a type="button" class="text-color-dark mx-3 position-relative" data-bs-toggle="offcanvas"
                            data-bs-target="#notification" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class='bx bx-bell h4 secondary-color' id="bell">

                            </span>

                        </a>

                        <a type="button" class="text-color-dark me-2" data-bs-toggle="offcanvas"
                            data-bs-target="#messages" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class='bx bx-message-dots secondary-color h4' id="chats">
                                <span
                                    class="position-absolute top-2 start-200 translate-middle p-1 bg-danger border border-light rounded-circle">
                                </span>
                            </span>
                        </a>
                        <button type="button" class="btn">
                            <img src="{{ asset('assets/img/user-06.jpg') }}" class="rounded-circle driver-profile"
                                width="30" alt="Admin">
                            <span class="secondary-color">{{ auth()->user()->firstname }}</span>
                        </button>
                    </div>
                </div>
            </nav>
            <!-- for notification -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="notification"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="notificationLabel">Notifications</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="notif-card">
                    {{-- <div class="card border-0 mb-1 rounded" style="max-width: 540px;" data-id="${msg.outgoing_msg_id}">
                        <div class="row g-0">
                            <div class="col-md-8" style="height: fit-content">
                                <div class="card-body">
                                    <span class="card-title text-secondary"><b>There is no notifications</b></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="card border-0 rounded notification-container" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-2 justify-contents">
                                <img class="img-fluid rounded"
                                    src="https://w7.pngwing.com/pngs/895/199/png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png"
                                    alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="card-title"><b>John Doe</b></span>
                                    <span class="card-text">has a request.</span><br>
                                    <span class="card-text"><small class="text-body-secondary text-secondary">3 mins
                                            ago</small></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- for messages -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="messages" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="notificationLabel">Messages History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="messages-card">

                    {{-- <div class="card border-0 rounded notification-container" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2 justify-contents">
                        <img class="img-fluid rounded"
                            src="https://w7.pngwing.com/pngs/895/199/png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="card-title"><b>John Doe</b></span>
                            <span class="card-text">has a request.</span><br>
                            <span class="card-text"><small class="text-body-secondary text-secondary">3 mins
                                    ago</small></span>
                        </div>
                    </div>
                </div>
            </div> --}}
                </div>
            </div>
            <!-- for guidelines -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="guidelines" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-danger" id="notificationLabel">How to enabled location in a
                        browser?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h4 class="mb-4">Enhance Your Experience with Accurate Location</h4>
                    <p><span class="text-primary">advantage </span> to share your location with us and receive
                        personalized services and faster delivery options.</p>

                    <button type="button" class="btn btn-danger mt-3 mx-5" data-bs-dismiss="modal" aria-label="Close">
                        <i class='bx bxs-x-circle'></i>
                        You Declined Permission
                    </button>

                    {{-- <p id="message" class="mt-2">Click "Allow" to share your location for a better user experience.</p> --}}
                    <ol id="ol" class="mt-3">
                        <li>
                            <strong class="text-primary">Google Chrome:</strong>
                            <ul>
                                <li>Open Google Chrome on your computer or mobile device.</li>
                                <li>In the top-right corner, click on the three-dot menu (hamburger menu).</li>
                                <li>From the dropdown menu, select "Settings."</li>
                                <li>Scroll down and click on "Privacy and security" in the left-hand side menu.</li>
                                <li>Under "Privacy and security," click on "Site settings."</li>
                                <li>Look for "Location" in the permissions list and click on it.</li>
                                <li>Toggle the switch to enable location access for all sites or click on the "Add"
                                    button to allow specific sites to access your location.</li>
                            </ul>
                        </li>
                    </ol>

                </div>
            </div>
            <!-- for maintenance vehicle -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="maintenance"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="notificationLabel"><span class="bx bxs-car-mechanic"></span>
                        Maintenance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="maintenance-card">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="maintenance-date">Maintenance Starting Date</label>
                            <input type="date" id="maintenance-starting-date" class="form-control text-secondary"
                                placeholder="Maintenance Date">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="maintenance-date">Maintenance End Date</label>
                            <input type="date" id="maintenance-end-date" class="form-control text-secondary"
                                placeholder="Maintenance Date">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="maintenance-date">Maintenance Description</label>
                            <textarea type="text" id="maintenance-description" rows="5" class="form-control text-secondary"
                                placeholder="Enter your reason, to stay updated your costumer."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" id="success-container">
                            <div class="mb-3">
                                <a href="#" type="button" id="send-maintenance"
                                    class="btn btn-success form-control">Set Maintenance</a>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6" id="chat-container">
                            <div class="mb-3">
                                <a href="#" type="button" id="chat-driver-side" class="btn btn-success form-control">Chat</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @yield('contents')
        </section>

        @include('components.drivers.location')
        @yield('location-modal')

        @include('components.drivers.chatroom')
        @yield('driver.chat.customer')

        @include('components.drivers.reciept-modal')
        @yield('reciept.modal')

        {{-- </div> --}}
    </div>
    @include('components.drivers.footer.footer')
    @yield('footer')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        const baseUrls = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;
        let tmpData = '';
        let tmpRcpt = '';
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f6459200cae7a43a20f0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('notifaction-channel');
        channel.bind('notify-user', function(data) {
            console.log(JSON.stringify(data.data));
            getMaintenance()
            sendRequest()
            getSeenMessage()
            getUnseenMessage()
        });

        // Register the plugin
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const vehicleLicensed = document.querySelector('#vehicle-licensed');
        const vehicleImage = document.querySelector('#vehicle-image');

        // Create a FilePond instance for Licensed
        const pond1 = FilePond.create(vehicleLicensed, {
            server: {
                process: '/tmp-UploadLicensed',
                revert: '/tmp-deleteLicensed',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        // Create a FilePond instance for Vehicle image
        const pond2 = FilePond.create(vehicleImage, {
            server: {
                process: '/tmp-UploadVehicleProfile',
                revert: '/tmp-deleteVehicleProfile',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });


        // chat functionality
        incoming_id = 0,
            $(document).on('click', '#chat-driver-side', function(e) {
                // alert('yes')
                // client id
                var reciever_id = parseInt($(this).attr("value"), 10);
                $('#incoming_id').val(reciever_id);
                incoming_id = reciever_id
                // alert(reciever_id)
                $('#customerInfo').offcanvas('hide')
                $('#chat-customer').offcanvas('show')
                renderMessage()
                console.log('#chat-driver-side rendere success')

            })


        const form = $(".typing-area"),
            inputField = form.find(".input-field-driver"),
            sendBtnDriver = form.find("#driver-btn"),
            chatBox = $(".chat-box"); // Assuming you have a .chat-box element

        form.on("submit", function(e) {
            e.preventDefault();
        });

        inputField.focus();

        inputField.on("keyup", function() {
            if (inputField.val() !== "") {
                sendBtnDriver.addClass("active");
            } else {
                sendBtnDriver.removeClass("active");
            }
        });

        sendBtnDriver.on("click", function() {
            let formData = new FormData(form[0]);
            $.ajax({
                type: "POST",
                url: "/send-client-message",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    inputField.val("");
                    renderMessage();
                    console.log('sendBtnDriver rendere success')
                    scrollToBottom();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        chatBox.on("mouseenter", function() {
            chatBox.addClass("active");
        });

        chatBox.on("mouseleave", function() {
            chatBox.removeClass("active");
        });

        const renderMessage = () => {
            $.ajax({
                type: "POST",
                url: "/get-client-message",
                data: {
                    incoming_id: incoming_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {

                    console.log(data)
                    // Remove duplicates from the data array based on a unique identifier (e.g., message ID)
                    const uniqueData = [];
                    const uniqueIds = new Set();

                    data.forEach(msg => {
                        // Assuming each message has a unique identifier like "id"
                        if (!uniqueIds.has(msg.msg)) {
                            uniqueIds.add(msg.msg);
                            uniqueData.push(msg);
                        }
                    });
                    console.log(uniqueData)
                    // chatBox.html(data);
                    var html = ''

                    uniqueData.forEach(msg => {
                        const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
                        const matches = msg.documents && msg.documents[0] && msg.documents[0]
                            .path && regex.test(msg.documents[0].path) ? msg.documents[0].path :
                            'profile.png';
                        let extPath = msg.documents[0] ? "profile" : "default";
                        // reciever
                        if (msg.outgoing_msg_id === incoming_id) {
                            $('#user_header_name').html(`${msg.firstname} ${msg.lastname}`)
                            html += `<div class="chat incoming">
                                <img src="${baseUrls}/storage/${extPath}/${matches}" alt="">
                                <div class="details">
                                    <p>${msg.msg}</p>
                                </div>
                                </div>`
                        } else {
                            html += `<div class="chat outgoing">
                                <div class="details">
                                    <p>'${msg.msg}'</p>
                                </div>
                                </div>`
                        }
                    });

                    chatBox.empty();
                    chatBox.append(html);
                    if (!chatBox.hasClass("active")) {
                        scrollToBottom();
                    }
                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        };



        const getUnseenMessage = async () => {
            var reciever_id = parseInt($('#view').attr("data-id"), 10);

            try {
                // Fetch unseen message data
                const messageData = await $.ajax({
                    type: "POST",
                    url: "/get-unseen-message",
                    data: {
                        incoming_id: reciever_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Fetch booking data
                const bookingData = await $.ajax({
                    type: "GET",
                    url: "/get-booked",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Fetch payment data
                const paymentData = await $.ajax({
                    type: "GET",
                    url: "/get-payments",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Combine messages, booking requests, and payment data
                const mergedData = [...messageData, ...bookingData, ...paymentData];

                // Render the combined data
                renderData(mergedData);
            } catch (error) {
                console.error(error);
            }



            // old version function
            // $.ajax({
            //     type: "POST",
            //     url: "/get-unseen-message",
            //     data: {
            //         incoming_id: reciever_id
            //     },
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     success: (messageData) => {
            //         // Fetch booking data after fetching messages
            //         $.ajax({
            //             type: "GET",
            //             url: "/get-booked",
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
            //                     'content')
            //             },
            //             success: (bookingData) => {
            //                 // Combine messages and booking requests
            //                 const mergedData = [...messageData, ...bookingData];

            //                 // Render the combined data
            //                 renderData(mergedData);
            //             },
            //             error: (xhr, status, error) => {
            //                 console.error(error);
            //             }
            //         });
            //     },
            //     error: (xhr, status, error) => {
            //         console.error(error);
            //     }
            // });

        }

        // render data
        const renderData = (data) => {
            var dots = '';
            var message = '';
            var html = '';
            console.log('the data is here')
            console.log(data)
            if (data.length > 1) {
                console.log(data.length)
                // alert('dwadwad')
                // Organize messages and booking requests
                const groupedData = {};
                data.forEach(item => {
                    const key = item.id; // Use a unique identifier for each item

                    if (!groupedData[key] || item.created_at > groupedData[key].created_at) {
                        groupedData[key] = item;
                    }
                });

                // Generate HTML for the merged data
                Object.values(groupedData).forEach(item => {

                    const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
                    const matches = item.documents && item.documents[0] && item.documents[0].path && regex.test(
                        item
                        .documents[0].path) ? item.documents[0].path : 'profile.png';
                    let extPath = ''
                    dots =
                        `<span class="position-absolute top-2 start-200 translate-middle p-1 bg-danger border border-light rounded-circle"></span>`;

                    if (item.hasOwnProperty('msg')) {
                        extPath = item.documents[0] ? 'profile' : 'default';
                        // Render message
                        html += `<div class="card border-0 mb-1 rounded notification-container" style="max-width: 540px;" data-id="${item.outgoing_msg_id}">
                                    <div class="row g-0">
                                        <div class="col-md-2 justify-contents">
                                            <img class="img-fluid rounded-start"
                                                src="${baseUrls}/storage/${extPath}/${matches}"
                                                alt="">
                                        </div>
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title"><b>${item.firstname} ${item.lastname}</b></span>
                                                <span class="card-text">has a message.</span><br>
                                                <span class="card-text"><small class="text-body-secondary text-secondary">${item.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    }else if(item.hasOwnProperty('reciept')){
                        tmpRcpt = item;
                        html += `<div class="card border-0 mb-1 rounded notification-container" style="max-width: 540px;" data-id="RCPT-${item.id}" data-driver="${item.user_id}">
                                    <div class="row g-0">
                                        <div class="col-md-2 justify-contents">
                                            <img class="img-fluid rounded-start"
                                                src="${baseUrls}/storage/reciept/${item.path}"
                                                alt="">
                                        </div>
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title"><b>${item.firstname} ${item.lastname}</b></span>
                                                <span class="card-text">has sent you a reciept.</span><br>
                                                <span class="card-text"><small class="text-body-secondary text-secondary">${item.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    } else {
                        // Render booking request
                        if (item.status === 'pending') {
                            html += `<div class="card border-0 mb-1 rounded notification-container" style="max-width: 540px;" data-id="BKD-${item.id}" data-driver="${item.user_id}">
                                    <div class="row g-0">
                                        <div class="col-md-2 justify-contents">
                                            <img class="img-fluid rounded-start"
                                                src="${baseUrls}/storage/default/profile.png"
                                                alt="">
                                        </div>
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title"><b>${item.firstname} ${item.lastname}</b></span>
                                                <span class="card-text">has a booking request.</span><br>
                                                <span class="card-text">status <span class="text-warning">${item.status}</span>.</span><br>
                                                <span class="card-text"><small class="text-body-secondary text-secondary">${item.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        }
                    }
                });
            }else {
                            dots = ``
                            html += `<div class="card border-0 mb-1 rounded notification-container" style="max-width: 540px;">
                                                <div class="row g-0">

                                                    <div class="col-md-12" style="height: fit-content">
                                                        <div class="card-body">
                                                            <span class="card-title text-secondary"><b>There's is no Notification's</b></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;
                        }


            // Update the container with the merged data
            $('#bell').html(dots);
            $('#notif-card').html(html);
        };

        // get the seen message for history
        const getSeenMessage = async () => {
            // var reciever_id = parseInt($('#view').attr("data-id"), 10);
            // console.log(reciever_id)
            $.ajax({
                type: "POST",
                url: "/get-seen-message",
                data: {
                    // for now
                    incoming_id: 1
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    // chatBox.html(data);
                    var html = ''
                    if (data.length === 0) {
                        html += `<div class="card border-0 mb-1 rounded" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title text-secondary"><b>There is no message history</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    } else {
                        // Organize messages by sender or recipient
                        const groupedMessages = {};
                        data.forEach(msg => {
                            const key = msg.outgoing_msg_id === incoming_id ? msg
                                .incoming_msg_id : msg.outgoing_msg_id;

                            if (!groupedMessages[key] || msg.created_at > groupedMessages[key]
                                .created_at) {
                                groupedMessages[key] = msg;
                            }
                        });
                        // Generate HTML for the latest messages
                        Object.values(groupedMessages).forEach(msg => {
                            const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
                            const matches = msg.documents && msg.documents[0] && msg.documents[
                                    0].path && regex.test(msg.documents[0].path) ? msg
                                .documents[0].path : 'profile.png';
                            let extPath = msg.documents[0] ? "profile" : "default";
                            // console.log(msg)
                            if (msg.read != 'seen') {
                                html += `<div class="card border-0 mb-1 rounded notification-container position-relative" style="max-width: 540px;" data-id="${msg.outgoing_msg_id}">
                                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">

                                    </span>
                                    <div class="row g-0">
                                        <div class="col-md-2 justify-contents">
                                            <img class="img-fluid rounded-start"
                                                src="${baseUrls}/storage/${extPath}/${matches}"
                                                alt="">
                                        </div>
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title"><b>${msg.firstname} ${msg.lastname}</b></span>

                                                <span class="card-text"><small class="text-body-secondary text-secondary">${msg.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            } else {
                                html += `<div class="card border-0 mb-1 rounded notification-container position-relative bg-white" style="max-width: 540px;" data-id="${msg.outgoing_msg_id}">

                                    <div class="row g-0">
                                        <div class="col-md-2 justify-contents">
                                            <img class="img-fluid rounded-start"
                                                src="${baseUrls}/storage/${extPath}/${matches}"
                                                alt="">
                                        </div>
                                        <div class="col-md-8" style="height: fit-content">
                                            <div class="card-body">
                                                <span class="card-title"><b>${msg.firstname} ${msg.lastname}</b></span>

                                                <span class="card-text"><small class="text-body-secondary text-secondary">${msg.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            }


                            //   }else{
                            //     html += `<div class="chat outgoing">
                        //             <div class="details">
                        //                 <p>'${msg.msg}'</p>
                        //             </div>
                        //             </div>`
                            //   }
                        });
                    }

                    $('#messages-card').html(html)

                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        }

        function scrollToBottom() {
            chatBox.scrollTop(chatBox[0].scrollHeight);
        }

        // click the notification container
        $(document).on('click', '.notification-container', function() {
            const pattern = /^(BKD-)?\d+$/;
            const dataId = $(this).data("id").toString();
            // const driverIdRequest = $(this).data("driver")
            const isMatch = pattern.test(dataId);
            // RCPT
            const patternRCPT = /^(RCPT-)?\d+$/;
            const dataIdRCPT = $(this).data("id").toString();
            // const driverIdRequest = $(this).data("driver")
            const isMatchRCPT = patternRCPT.test(dataIdRCPT);


            if (isMatch || isMatchRCPT) {
                if (dataId.startsWith("BKD-")) {
                    // set the driver id to localStorage
                    // localStorage.setItem('driver-id',driverIdRequest);
                    console.log(`String '${dataId}' starts with 'BKD-'`);
                    // Extract the number from the data-id value
                    const numberPart = dataId.replace("BKD-", "");
                    console.log(`Number part: ${numberPart}`);
                    console.log(tmpData)
                    // Use the find() method to find the object with the specified ID
                    const foundObject = tmpData.find(obj => obj.id === parseInt(numberPart));
                    // console.log(foundObject)
                    $('#customerInfo').offcanvas('show')
                    // Determine the class based on status
                    var statusClass = foundObject.status === "pending" ?
                        "text-white border border-danger bg-danger" : "text-white border border-success bg-success";
                    $('#booking-id').val("BKD-" + foundObject.id + ` >> ${foundObject.status.toUpperCase()} STATUS`)
                        .addClass(statusClass); // Add the determined class
                    $('#firstname').val(foundObject.firstname)
                    $('#middlename').val(foundObject.middlename)
                    $('#lastname').val(foundObject.lastname)
                    $('#contact').val(foundObject.contact)
                    $('#email').val(foundObject.email)
                    $('#destination').val(foundObject.destination)
                    $('#pickup').val(foundObject.pickup)
                    $('#landmark').val(foundObject.landmark)
                    $('#dateoftrip').val(foundObject.dateoftrip)
                    $('#pax').val(foundObject.pax + ' Person')
                    $('#daysandhours').val(foundObject.daysandhours + ' Hour/s')
                    $('#time').val("Pickup-time >> " + convertTo12HourFormat(foundObject.pickuptime))
                    $('#chat-driver-side').attr('value', foundObject.sender_id)
                    if(foundObject.status === 'accepted'){
                        $('#accept').addClass('disabled')
                    }else{
                        $('#accept').removeClass('disabled')
                    }

                    $(document).on('click', '#accept', function() {
                        // sendRequest()
                        $('#customerInfo').offcanvas('hide')
                        $('#notification').offcanvas('hide')
                    })
                    // $('#customerInfo').offcanvas('hide')

                } else if(dataIdRCPT.startsWith('RCPT-')) {
                    $('#receiptModal').modal('show');
                    $('#notification').offcanvas('hide')
                    $('#rcpt').attr('src',baseUrls+'/storage/reciept/'+tmpRcpt.path)
                    $('#first_name').val(tmpRcpt.firstname)
                    $('#last_name').val(tmpRcpt.lastname)

                } else {
                    console.log(`String '${dataId}' is a number`);
                    var client_id = parseInt(dataId, 10);
                    incoming_id = client_id;
                    $('#incoming_id').val(incoming_id);
                    $('#chat-customer').offcanvas('show');
                    renderMessage();
                    console.log('.notification-container rendere success')
                    updateUnseenMessage(incoming_id);
                }
            } else {
                console.log(`String '${dataId}' does not match the pattern`);
            }
        });

        // recieved
        $(document).on('click', '#recieved', function() {
            // alert('recieved')
            $.ajax({
                url: `/post-recieved`,
                type: "POST",
                dataType: "json",
                data: {
                    id: tmpRcpt.id,
                    name: tmpRcpt.firstname + ' '+ tmpRcpt.lastname,
                    email: tmpRcpt.email,
                },
                success: function(res) {
                    console.log(res)
                    if(res.status == 'success'){
                        $('#receiptModal').modal('hide');
                        $('#notification').offcanvas('show')
                    }
                    // renderMessage()
                    getMaintenance()
                    sendRequest();
                    getSeenMessage()
                    getUnseenMessage()
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })

        // update the unseen message to seen
        const updateUnseenMessage = async (customer_id) => {
            $.ajax({
                type: "POST",
                url: "/update-unseen-message",
                data: {
                    outgoing_id: customer_id
                },
                success: (data) => {
                    console.log(data)

                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        }

        // const accept booking
        $(document).on('click', '#accept', function() {
            // alert('sent email to the user')
            // $user_name, $booking_id,$pickup,$dropoff, $booking_date
            const email = $('#email').val()
            const user_name = $('#firstname').val()
            const booking_id = $('#booking-id').val()
            const dropoff = $('#destination').val()
            const pickup = $('#pickup').val()
            const booking_date = $('#dateoftrip').val()
            $.ajax({
                type: "POST",
                url: "/confirmation-email",
                data: {
                    email: email,
                    booking_id: booking_id,
                    dropoff: dropoff,
                    pickup: pickup,
                    booking_date: booking_date,
                },
                success: (data) => {
                    console.log(data)
                    if (data.status == 'success') {
                        $('#customerInfo').offcanvas('hide')
                        sendRequest()
                        // Reset input fields to clear their values
                        $('#email').val('');
                        $('#firstname').val('');
                        $('#booking-id').val('');
                        $('#destination').val('');
                        $('#pickup').val('');
                        $('#dateoftrip').val('');
                    }

                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        })

        let dataTable = null;

        const getAllBooked = async (response) => {
            if (!dataTable) {
                dataTable = $('#booked').DataTable({
                    "data": response,
                    "responsive": true,
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'rt>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        // 'copy', 'spacer', 'csv', 'spacer', 'excel', 'spacer', 'pdf',
                        // 'spacer',
                        {
                            extend: 'print',
                            text: 'Print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5,
                                    6
                                ], // Specify the columns to include in the print view
                            }
                        },
                    ],
                    "columns": [{
                            data: "id",
                            render(data, type, row, meta) {
                                return `<p>BKD-${row.id}</p>`
                            }
                        },
                        {
                            data: "status",
                            render(data, type, row, meta) {
                                return `<p><span class="badge ${row.status === 'pending' ? 'text-bg-warning' : row.status === 'accepted' ? 'text-bg-success' : 'text-bg-danger'}">${row.status}</span></p>`
                            }
                        },
                        {
                            data: "contact",
                            render(data, type, row, meta) {
                                return `<p>+63${row.contact}</p>`
                            }
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "destination"
                        },
                        {
                            data: "pickup"
                        },
                        {
                            data: "landmark"
                        },
                        {
                            data: "dateoftrip"
                        },

                        {
                            data: "user_id",
                            render(data, type, row, meta) {
                                var a = `
                            <a href="#" value="${row.id}" data-id="${row.sender_id}" id="view" class="">view more</a>
                        `;
                                return a;
                            }
                        },
                    ]
                });
            } else {
                dataTable.clear().rows.add(response).draw(); // Update the data and redraw the table
            }
        }

        const sendRequest = () => {
            const id = $('#driver-id').val();
            $.ajax({
                url: `/getAllBooked/${id}`,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    tmpData = res;
                    getAllBooked(res);
                    clickHandler(res)

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        const clickHandler = async (data) => {

            $(document).on('click', '#view', function(e) {
                console.log(data)
                var view_id = parseInt($(this).attr("value"), 10);
                // Use the find() method to find the object with the specified ID
                const foundObject = data.find(obj => obj.id === view_id);
                // console.log(foundObject)
                $('#customerInfo').offcanvas('show')
                // Determine the class based on status
                var statusClass = foundObject.status === "pending" ?
                    "text-white border border-danger bg-danger" :
                    "text-white border border-success bg-success";
                $('#booking-id').val("BKD-" + foundObject.id +
                    ` >> ${foundObject.status.toUpperCase()} STATUS`).addClass(
                    statusClass); // Add the determined class
                $('#firstname').val(foundObject.firstname)
                $('#middlename').val(foundObject.middlename)
                $('#lastname').val(foundObject.lastname)
                $('#contact').val(foundObject.contact)
                $('#email').val(foundObject.email)
                $('#destination').val(foundObject.destination)
                $('#pickup').val(foundObject.pickup)
                $('#landmark').val(foundObject.landmark)
                $('#dateoftrip').val(foundObject.dateoftrip)
                $('#pax').val(foundObject.pax + ' Person')
                $('#daysandhours').val(foundObject.daysandhours + ' Hour/s')
                $('#time').val("Pickup-time >> " + convertTo12HourFormat(foundObject.pickuptime))
                $('#chat-driver-side').attr('value', foundObject.sender_id)
                if(foundObject.status === 'accepted'){
                    $('#accept').addClass('disabled')
                }else{
                    $('#accept').removeClass('disabled')
                }
            })


        }

        // convert time to AM/PM
        const convertTo12HourFormat = (time) => {
            // Parse the time into hours and minutes
            const [hours, minutes] = time.split(":").map(Number);

            // Determine if it's AM or PM
            const period = hours >= 12 ? "PM" : "AM";

            // Convert hours to 12-hour format
            const hours12Format = hours % 12 || 12;

            // Return the time in AM/PM format
            return `${hours12Format}:${minutes.toString().padStart(2, "0")} ${period}`;
        }

        // testing phase
        const NotifyUser = async (message) => {
            if ('Notification' in window) {
                Notification.requestPermission()
                    .then(permission => {
                        if (permission === 'granted') {
                            // Permission granted, you can now show notifications
                            const notification = new Notification('Title', {
                                body: 'This is the notification message.',
                                icon: 'path/to/icon.png' // Optional
                            });

                            // You can also handle notification events
                            notification.onclick = () => {
                                // Handle notification click
                            };
                        }
                    });
            }
        }

        // POST MAINTENANCE
        $(document).on('click', '#send-maintenance', function() {
            // alert("JOMAR");
            const starting = $('#maintenance-starting-date').val()
            const end = $('#maintenance-end-date').val()
            const desc = $('#maintenance-description').val()
            $.ajax({
                url: `/post-maintenance`,
                type: "POST",
                dataType: "json",
                data: {
                    startingDate: starting,
                    endDate: end,
                    description: desc,

                },
                success: function(res) {
                    console.log(res)
                    if (res.status === 'success') {
                        $('#maintenance-starting-date').val('')
                        $('#maintenance-end-date').val('')
                        $('#maintenance-description').val('')
                        // $('#maintenance-display').removeClass('text-danger').addClass('text-success').text('Maintenance Repair')
                        $('#maintenance').offcanvas('hide');
                    }
                },
                error: function(error) {
                    console.log("DITO");
                    console.log(error.responseJSON);
                }
            });
        })

        // get Maintenance
        const getMaintenance = async () => {
            $.ajax({
                url: `/get-maintenance`,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    if (res.maintenance.status === 'success') {
                        $('#maintenance-display').removeClass('text-danger').addClass('text-success')
                            .text('Maintenance Success')
                    } else {
                        $('#maintenance-display').text('Maintenance Repair')
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // renderMessage()
        getMaintenance()
        sendRequest();
        getSeenMessage()
        getUnseenMessage()
    </script>
    @yield('script')
</body>

</html>
