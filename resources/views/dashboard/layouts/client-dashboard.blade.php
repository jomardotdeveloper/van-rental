{{-- @extends('../components.frequently')
@extends('../components.details') --}}
{{-- @extends('details') --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- header --}}
    @include('components.clients.header.head')
    @yield('header')
    {{-- style --}}
    @yield('links')
    <!-- Sweet Alert-->
    <link href="{{ asset('assets/client/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/client/toastr/toastr.min.css') }}">
    <style>
        /* theming */
        :root {
            --white: #fff;
            /* --primary-color:#6096BA; */
            --secondary-color: #274C77;
            --tertiary-color: #33AB63;
            --last-color: #E74A4A;


        }

        #chat-driver {
            width: 35%;
            /* background: red; */
            /* height: fit-content; */
        }

        .notification-container {
            max-width: 100%;
            /* Set the card's maximum width to the full width of the viewport */
        }

        .notification-container .row {
            /* width: 400px; */
            display: flex;
            flex-direction: row;
            align-items: center;
            padding-left: 20px;
            /* border: 1px solid red; */
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .notification-container .row .col-md-2 {
            /* border: 1px solid red; */
            max-width: 10%;
            height: 35px;
            /* border-radius: 50%; */
        }

        .notification-container .row .col-md-2 img {
            /* max-width: 10%; */
            height: 35px;
            border-radius: 50%;
        }

        .notification-container .row .col-md-8 {
            max-width: 90%;
            height: 70px;
            /* border: 1px solid red; */
        }

        .wrappers {
            margin: auto;
            background: var(--white);
            max-width: inherit;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
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
            background: #f7f7f7;
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
            background: var(--primary-color);
            color: var(--white);
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
            background: var(--white);
            color: var(--primary-color);
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
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
        }

        .typing-area button {
            color: var(--white);
            width: 55px;
            border: none;
            outline: none;
            background: var(--primary-color);
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
        @media screen and (max-width: 600px) {
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

                border: 1px solid green;
            }

            #chat-driver {
                /* background: red; */
                width: 100%;

            }

            #pay-container {
                display: flex;
                flex-direction: row;
                background: var(--secondary-color);
                color: var(--white);
                border-radius: 10px;
                align-content: center;
                justify-content: center;
            }

            #contents {
                /* border: 1px solid red; */
                width: 80%;
            }

            #chat-driver-side {
                background: var(--secondary-color);
            }

            .label {
                color: var(--secondary-color);
                font-size: 12px;
            }

            .input {
                color: var(--secondary-color);
                letter-spacing: 2px;
                font-weight: 550;
                text-align: center;
                font-size: 16px;
                border: 0 0 1px 0;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('loader/loader.css') }}">
</head>

<body>
    {{-- loader --}}
    <div class="modal-loader">
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>
    </div>

    {{-- navigation --}}
    @include('components.clients.nav')
    @yield('client-nav')

    <main>

        {{-- v1.1 --}}
        @yield('contents')

        @include('components.clients.chatroom')
        @yield('client.chat.driver')

        <!-- for notification -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="notification" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="notificationLabel">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="notif-card">

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

        {{-- booked information --}}
        @include('components.clients.booked-info')
        @yield('booked.info')
        {{-- payments information --}}
        @include('components.clients.payment')
        @yield('payment.info')
    </main>


    @include('components.clients.footer.footer')
    @yield('footer')

    @yield('script')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{ asset('loader/loader.js') }}"></script>
    <script src="{{ asset('assets/client/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/client/toastr/toastr.min.js') }}"></script>
    @if (isset($_GET['amount']))
    <script>
        Swal.fire(
            'Good job!',
            'Successfuly booked!',
            'success'
        );
    </script>
    @endif

    <script>
        // showSuccessAlert(name) {
        //     swal(`Successfully book.`, "Have a safe ride with us!", "success");
        // }
        // showSuccessAlert("");
    </script>
    <script>
        const baseUrls = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;

        // Register the plugin
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelector('#reciept-image');


        // Create a FilePond instance
        // Create a FilePond instance
        const receipt = FilePond.create(inputElement, {
            server: {
                process: {
                    url: '/tmp-upload-reciept',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    onload: (response) => {
                        // The server response is available in the 'response' object
                        const parsedResponse = JSON.parse(response);
                        console.log('Server Response:', parsedResponse);

                        // Store the parsedResponse in a variable
                        // const storedResponse = parsedResponse;
                        localStorage.setItem('reciept-upload', JSON.stringify(parsedResponse));
                        // Handle the server response here
                    },
                    onerror: (error) => {
                        console.error('Error uploading image:', error);
                    }
                },
                revert: {
                    url: '/tmp-delete-reciept',
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    onload: (response) => {
                        // The revert server response is available in the 'response' object
                        const parsedResponse = JSON.parse(response);
                        console.log('Revert Server Response:', parsedResponse);

                        // Handle the revert server response here
                    },
                    onerror: (error) => {
                        console.error('Error reverting file:', error);
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        // Adding a custom event listener to execute revert action with storedResponse
        receipt.on('revertfile', (file) => {
            let storedResponse = JSON.parse(localStorage.getItem('reciept-upload'))
            if (storedResponse) {
                // Use storedResponse to make the AJAX request for reverting
                $.ajax({
                    url: '/tmp-delete-reciept',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: storedResponse,
                    success: function(response) {
                        console.log(response.message);
                        // Handle the success response
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle the error
                    }
                });
            }
        });

        $(document).on('click', '.upload-reciept', function() {
            let recieptInLocal = JSON.parse(localStorage.getItem('reciept-upload'))
            let dID = localStorage.getItem('driver-id')
            console.log(recieptInLocal.uploaded_record.folder)
            $.ajax({
                type: "POST",
                url: "/send-driver-reciept",
                data: {
                    folder: recieptInLocal.uploaded_record.folder,
                    driverId: parseInt(dID)
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    if (response.status == 'success') {
                        $('.modal-loader').show()

                        setTimeout(() => {
                            $('.modal-loader').hide()
                        }, 2000)
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })




        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f6459200cae7a43a20f0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('notifaction-channel');
        channel.bind('notify-user', function(data) {
            console.log(JSON.stringify(data.data));
            getSeenMessage()
            getUnseenMessage()
        });

        // chat functionality
        incoming_id = 0,
            $(document).on('click', '#chat-driver', function(e) {
                var reciever_id = parseInt($(this).attr("value"), 10);
                $('#incoming_id').val(reciever_id);
                incoming_id = reciever_id
                $('#details').modal('hide')
                $('#chat-driver-side').offcanvas('show')
                renderMessage()
            })


        const form = $(".typing-area"),
            inputField = form.find(".input-field"),
            sendBtn = form.find("button"),
            chatBox = $(".chat-box"); // Assuming you have a .chat-box element

        form.on("submit", function(e) {
            e.preventDefault();
        });

        inputField.focus();

        inputField.on("keyup", function() {
            if (inputField.val() !== "") {
                sendBtn.addClass("active");
            } else {
                sendBtn.removeClass("active");
            }
        });

        sendBtn.on("click", function() {
            let formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: "/send-client-message",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                success: function(response) {
                    inputField.val("");
                    renderMessage();
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

        const renderMessage = async () => {
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
                    // Remove duplicates from the data array based on a unique identifier (e.g., message ID)
                    const uniqueData = [];
                    const uniqueIds = new Set();

                    data.forEach(msg => {
                        // Assuming each message has a unique identifier like "msg"
                        if (!uniqueIds.has(msg.msg)) {
                            uniqueIds.add(msg.msg);
                            uniqueData.push(msg);
                        }
                    });
                    // chatBox.html(data);
                    var html = ''

                    uniqueData.forEach(msg => {
                        // reciever
                        if (msg.outgoing_msg_id === incoming_id && msg.documents[0].path !=
                            null) {
                            console.log(msg.documents[0].path)
                            const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
                            const matches = msg.documents[0].path.match(regex);
                            let extPath = "profile";
                            $('#user_header_name').html(`${msg.firstname} ${msg.lastname}`)
                            html += `<div class="chat incoming">
                                <img src="${baseUrls}/storage/${extPath}/${msg.documents[0].path}" alt="">
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

        // render data
        const renderData = (data) => {
            var dots = '';
            var message = '';
            var html = '';

            if (data.length > 0) {
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
                    } else {
                        // Render booking request
                        // if (item.status === 'pending') {
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
                                                <span class="card-text">your booking request.</span><br>
                                                <span class="card-text">status is ${
                                                    item.status === 'accepted'
                                                        ? `<span class="text-success">${item.status}</span>`
                                                        : `<span class="text-warning">${item.status}</span>`
                                                }.</span><br>
                                                <span class="card-text"><small class="text-body-secondary text-secondary">${item.created_at}</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        // }
                    }
                });
            } else {
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

        // get the unseen message to seen
        const getUnseenMessage = async () => {
            // var reciever_id = parseInt($('#view').attr("data-id"), 10);
            // console.log(reciever_id)
            var reciever_id = parseInt($('#view').attr("data-id"), 10);

            $.ajax({
                type: "POST",
                url: "/get-unseen-message",
                data: {
                    incoming_id: 1
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (messageData) => {
                    // Fetch booking data after fetching messages
                    $.ajax({
                        type: "GET",
                        url: "/get-booked",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: (bookingData) => {
                            // Combine messages and booking requests
                            const mergedData = [...messageData, ...bookingData];

                            // Render the combined data
                            renderData(mergedData);
                        },
                        error: (xhr, status, error) => {
                            console.error(error);
                        }
                    });
                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        }
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
                            console.log(msg)
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

        // setInterval(() => {
        getUnseenMessage()
        getSeenMessage()
        // }, 1000);

        // click the notification container
        $(document).on('click', '.notification-container', function() {
            const pattern = /^(BKD-)?\d+$/;
            const dataId = $(this).data("id").toString();
            const driverIdRequest = $(this).data("driver")
            const isMatch = pattern.test(dataId);
            if (isMatch) {
                if (dataId.startsWith("BKD-")) {
                    localStorage.setItem('driver-id', driverIdRequest);
                    console.log(`String '${dataId}' starts with 'BKD-'`);
                    // Extract the number from the data-id value
                    const numberPart = dataId.replace("BKD-", "");
                    console.log(`Number part: ${numberPart}`);

                    $.ajax({
                        type: "GET",
                        url: `/get-booked/${parseInt(numberPart)}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: (bookingData) => {


                            console.log(bookingData)
                            // const foundObject = bookingData[0].find(obj => obj.id === parseInt(numberPart));
                            $('#bookedInfo').offcanvas('show');
                            var statusClass = bookingData[0].status === "pending" ?
                                "text-white border border-danger bg-danger" :
                                (bookingData[0].status === "payment" ?
                                    "text-dark border border-warning bg-warning" :
                                    "text-white border border-success bg-success");
                            $('#profile-payments').attr('src',
                                `${baseUrls}/storage/profile/${bookingData[0].documents[0].path}`)
                            // $('#profile2-payments').attr('src',`${baseUrls}/storage/profile/${bookingData[0].documents[0].path}`)
                            $('#name-payments').text(
                                `Name : ${bookingData[0].users[0].firstname} ${bookingData[0].users[0].lastname}`
                            )
                            $('#gcash-payments').text(`Gcash : +63-${bookingData[0].users[0].contact}`)
                            // Additional logic for success condition
                            if (bookingData[0].status === "accepted") {
                                $('#payment-status').val('Booking Successful').addClass(
                                    'border border-0 text-success');
                            } else {
                                $('#payment-status').val('Procceed To Payments').addClass(
                                    'border border-0 text-warning');
                            }
                            $('#booking-id').val("BKD-" + bookingData[0].id +
                                ` >> ${bookingData[0].status.toUpperCase()} STATUS`).addClass(
                                statusClass); // Add the determined class
                            $('#firstname-booked').val(bookingData[0].firstname)
                            $('#middlename-booked').val(bookingData[0].middlename)
                            $('#lastname-booked').val(bookingData[0].lastname)
                            $('#contact-booked').val(bookingData[0].contact)
                            $('#email-booked').val(bookingData[0].email)
                            $('#destination-booked').val(bookingData[0].destination)
                            $('#pickup-booked').val(bookingData[0].pickup)
                            $('#landmark-booked').val(bookingData[0].landmark)
                            $('#dateoftrip-booked').val(bookingData[0].dateoftrip)
                            $('#pax-booked').val(bookingData[0].pax + ' Person')
                            $('#daysandhours-booked').val(bookingData[0].daysandhours + ' Day/s')
                            $('#time').val(convertTo12HourFormat(bookingData[0].pickuptime))
                            $('#chat-driver-side').attr('value', bookingData[0].sender_id)
                            if (bookingData[0].status == 'accepted') {
                                $('.reciept').addClass('disabled')
                            } else {
                                $('.reciept').removeClass('disabled')
                            }


                        },
                        error: (xhr, status, error) => {
                            console.error(error);
                        }
                    });

                } else {
                    console.log(`String '${dataId}' is a number`);
                    var client_id = parseInt(dataId, 10);
                    incoming_id = client_id;
                    $('#incoming_id').val(incoming_id);
                    // alert(reciever_id)
                    $('#notification').offcanvas('hide')
                    $('#messages').offcanvas('hide')
                    $('#chat-driver-side').offcanvas('show')
                    renderMessage()
                    updateUnseenMessage(incoming_id)
                }
            } else {
                console.log(`String '${dataId}' does not match the pattern`);
            }
        })

        // update the unseen message to seen
        const updateUnseenMessage = async (customer_id) => {
            $.ajax({
                type: "POST",
                url: "/update-unseen-message",
                data: {
                    outgoing_id: customer_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)

                },
                error: (xhr, status, error) => {
                    console.error(error);
                }
            });
        }

        // back
        $(document).on('click', '.back-icon', function() {
            $('#notification').offcanvas('show')
            $('#chat-driver-side').offcanvas('hide')
        })

        $(document).on('click', '.reciept', function() {
            $('#bookedInfo').offcanvas('hide')
            $('#paymentInfo').offcanvas('show')
            $('#reciever_id').val(localStorage.getItem('driver-id'))
        })

        $(document).ready(function() {
            $("#copy-button").click(function() {
                var phoneNumber = $("#gcash-payments").text().split(":")[1].trim();

                if (navigator.clipboard) {
                    navigator.clipboard.writeText(phoneNumber)
                        .then(function() {
                            // Show the tooltip
                            $("#copy-button").tooltip("show");
                            // Hide the tooltip after 3 seconds
                            setTimeout(function() {
                                $("#copy-button").tooltip("hide");
                            }, 3000);
                        })
                        .catch(function(err) {
                            console.error('Unable to copy: ', err);
                        });
                } else {
                    console.error('Clipboard API not available.');
                }
            });
        });



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
    </script>

    {{-- // notification --}}
    @if (session()->has('notification'))
        <script>
            $(document).ready(function() {
                // Set Toastr options
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                var notificationJson = {!! json_encode(session('notification')) !!};
                var notification = JSON.parse(notificationJson);
                console.log(notification)
                toastr[notification.status](notification.message);
            });
        </script>
    @endif
</body>

</html>
