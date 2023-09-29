console.log("connected");

function FetchNotification() {
    var notif = "";
    var driverTable = "";
    var reqCount = 0;
    // report = 0,
    // client = 0,
    // driver = 0;
    $.ajax({
        url: "/accounts/approval",
        method: "GET",
        dataType: "json",
        success: function (accounts) {
            // This function will be executed when the request is successful
            console.log(accounts); // Do something with the retrieved data
            //   $('.notification-list')
            accounts.forEach((account) => {
                // if (account.show_to_dashboard == 1)
                //     return;
                reqCount++;
                notif += `
                     <li class="notification-message">
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">${account.firstname
                                    .charAt(0)
                                    .toUpperCase()}</span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">
                                    ${account.firstname} ${
                    account.lastname
                }</span> waiting for your approval.</p>
                                    <p class="noti-time"><span class="notification-time">${getTimeAgo(
                                        account.created_at
                                    )}</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    `;
                // for profile if they have
                // <h2><a href="profile.html" class="avatar text-white"><img
                //                         src="{{ asset('assets/img/profile/img-1.jpg') }}"
                //                         alt=""></a><a
                //                     href="profile.html">Parker <span></span></a></h2>

                // status
                var stats = ''
                if (account.approved == 0) {
                    stats = '<span class="badge badge-danger p-2">Pending</span>'
                }else if(account.is_activated === 0){
                    stats = '<span class="badge badge-danger p-2">Pending Registration</span>'
                }else if (account.approved == 1){
                    stats = '<span class="badge badge-success p-2">Account Approved</span>'
                }else if (account.is_activated === 1){
                    stats = '<span class="badge badge-success p-2">Vehicle Deployed</span>'
                }
                driverTable += `
                        <tr>
                            <td>
                               <h2 class="text-white">
                                    <span class="avatar">${account.firstname
                                        .charAt(0)
                                        .toUpperCase()}</span>
                                    <span class="text-success">${
                                        account.firstname
                                    } ${account.lastname}</span>
                               </h2>

                            </td>
                            <td>${account.email}</td>
                            <td>${account.nationality}</td>
                            <td>${account.contact}</td>
                            <td>${account.barangay}, ${account.street} st.</td>

                            <td>${
                               stats
                            }</td>

                            <td class="text-right">
                                <button type="button"
                                    class="btn btn-primary btn-sm mb-1 btn-view" data-id="${
                                        account.id
                                    }">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="modal"
                                    data-target="#delete_user"
                                    class="btn btn-danger btn-sm mb-1">
                                    <i class="far fa-trash-alt"></i>
                                </button>

                                <button type="button" class="btn btn-success btn-sm mb-1 btn-approved" data-id="${
                                    account.id
                                }">
                                    <i class="fas fa-check"></i>
                                </button>
                            </td>
                    </tr>
                `;

                if (getTime(account.created_at) < 1) {
                    // toastr
                    Command: toastr["info"](
                        `You have a new notification from ${account.firstname}`
                    );

                    toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        preventDuplicates: true,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        timeOut: "5000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                }
            });
            $(".notification-list").html(notif);
            $("#driver-table").html(driverTable);
            $("#request-content").html(reqCount);
            $("#notif-counts").html(reqCount);
        },
        error: function () {
            // This function will be executed if the request fails
            console.log("Error occurred while making the request.");
        },
    });
    // Call the function again after 3 seconds
    setTimeout(FetchNotification, 3000);
}

// Initial call to FetchNotification()
FetchNotification();

//   convert createdtime into seconds
function getTimeAgo(timestamp) {
    var specifiedTime = new Date(timestamp);
    var currentTime = new Date();
    var timeDifference = Math.floor((currentTime - specifiedTime) / 1000); // Time difference in seconds

    var minutes = Math.floor(timeDifference / 60) % 60; // Calculate the number of minutes
    var hours = Math.floor(timeDifference / 3600); // Calculate the number of hours
    if (hours > 0) {
        return hours + " hour and " + minutes + " mins ago";
    } else {
        return minutes + " mins ago";
    }
}
//   min only
function getTime(timestamp) {
    var specifiedTime = new Date(timestamp);
    var currentTime = new Date();
    var timeDifference = Math.floor((currentTime - specifiedTime) / 1000); // Time difference in seconds

    var minutes = Math.floor(timeDifference / 60); // Calculate the number of minutes

    return minutes;
}

$(document).ready(function () {
    $(document).on("click", ".btn-approved", function (e) {
        console.log("clicked");
        e.preventDefault();
        var id = $(this).data("id");
        approve(id);
    });

    // view
    $(document).on("click", ".btn-view", function (e) {
        console.log("clicked");
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            url: `/accounts/view/${id}`,
            method: "GET",
            dataType: "json",
            success: function (response) {
                var html = "";
                const baseUrl = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;
                // if(response.status == 'success'){
                $("#viewModal").modal("show");
                console.log(response.id);
                // profile = `{{ asset(storage/profile/tmp/$response[0].path))  }}`;
                html = `<div class="col-md-8">
                    <span><b>Basic Information</b></span>
                    <div class="col-md-12 row border rounded p-2">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="firstName" class='text-secondary'><b>First Names</b></label>
                                <input type="text" name="firstName" class="form-control border-info text-info" id="firstName"
                                    placeholder="First Name" value="${
                                        response.firstname
                                    }" required>
                                <input type="text" name="id" class="form-control border-info text-info"
                                    placeholder="ID" value="${
                                        response.id
                                    }" hidden>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="lastName" class='text-secondary'><b>Last Name</b></label>
                                <input type="text" name="lastName" class="form-control border-info text-info" id="lastName"
                                    placeholder="Last Name" value="${
                                        response.lastname
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Middle Name</b></label>
                                <input type="text" name="middleName" class="form-control border-info text-info" id="middleName"
                                    placeholder="Middle Name" value="${
                                        response.middlename
                                    }">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="lastName" class='text-secondary'><b>Gender</b></label>
                                <input type="text" name="gender" class="form-control border-info text-info" id="gender"
                                    placeholder="Gender" value="${
                                        response.gender
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Age</b></label>
                                <input type="number" name="age" class="form-control border-info text-info" id="age"
                                    placeholder="Age" value="${
                                        response.age
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Birthdate</b></label>
                                <input type="text" name="birthplace" class="form-control border-info text-info" id="birthplace"
                                    placeholder="Birthplace" value="${
                                        response.birthdate
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Nationality</b></label>
                                <input type="text" name="nationality" class="form-control border-info text-info" id="nationality"
                                    placeholder="Nationality" value="${
                                        response.nationality
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Contact</b></label>
                                <input type="tel" name="contact" class="form-control border-info text-info" id="contact"
                                    placeholder="Contact: +63" required pattern="[0-9]{10}"
                                    title="Please enter a valid 10-digit mobile number" value="${
                                        response.contact
                                    }">
                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Email</b></label>
                                <input type="email" name="email" class="form-control border-info text-info" id="email"
                                    placeholder="Email" value="${
                                        response.email
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Birthdate</b></label>
                                <input type="date" name="birthdate" class="form-control border-info text-info" id="birthdate"
                                    placeholder="Birthdate" value="${
                                        response.birthdate
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Municipality</b></label>
                                <input type="text" name="municipality" class="form-control border-info text-info" id="municipality"
                                    placeholder="Municipality" value="${
                                        response.municipality
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Zip Code</b></label>
                                <input type="number" name="zipcode" class="form-control border-info text-info" id="zipcode"
                                    placeholder="Zip Code" value="${
                                        response.zipcode
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Barangay</b></label>
                                <input type="text" name="barangay" class="form-control border-info text-info" id="barangay"
                                    placeholder="Barangay" value="${
                                        response.barangay
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Street</b></label>
                                <input type="text" name="street" class="form-control border-info text-info" id="street"
                                    placeholder="Street" value="${
                                        response.street
                                    }" required>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-4">
                    <span><b>Vehicle Information</b></span>
                    <div class="col-md-12 row border rounded">

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="companyName" class='text-secondary'><b>Company Name</b></label>
                                <input type="string" name="companyName" class="form-control border-info text-info" id="companyName"
                                    placeholder="ID NO." value="${
                                        response.vans[0]
                                            ? response.vans[0].companyname
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Id No.</b></label>
                                <input type="number" name="idNumber" class="form-control border-info text-info" id="idNumber"
                                    placeholder="ID NO." value="${
                                        response.idno ? response.idno : 0
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>ORCR</b></label>
                                <input type="number" name="orcr" class="form-control border-info text-info" id="orcr"
                                    placeholder="ORCR" value="${
                                        response.orcr ? response.orcr : 0
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Plate Number</b></label>
                                <input type="text" name="plateNumber" class="form-control border-info text-info" id="plateNumber"
                                    placeholder="Vehicle Plate Number" value="${
                                        response.platenumber
                                            ? response.platenumber
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="Ac" class='text-secondary'><b>Aircon Type</b></label>
                                <input type="text" name="ac" class="form-control border-info text-info" id="ac"
                                    placeholder="Aircon Type" value="${
                                        response.vans[0]
                                            ? response.vans[0].ac
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="bags" class='text-secondary'><b>Bags</b></label>
                                <input type="number" name="bags" class="form-control border-info text-info" id="bags"
                                    placeholder="Bags" value="${
                                        response.vans[0]
                                            ? response.vans[0].bag
                                            : 0
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="seats" class='text-secondary'><b>Seats</b></label>
                                <input type="number" name="seats" class="form-control border-info text-info" id="seats"
                                    placeholder="Seats" value="${
                                        response.vans[0]
                                            ? response.vans[0].seat
                                            : 0
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="model" class='text-secondary'><b>Model</b></label>
                                <input type="text" name="model" class="form-control border-info text-info" id="model"
                                    placeholder="Model" value="${
                                        response.vans[0]
                                            ? response.vans[0].model
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="fuel" class='text-secondary'><b>Fuel</b></label>
                                <input type="text" name="fuel" class="form-control border-info text-info" id="fuel"
                                    placeholder="Seats" value="${
                                        response.vans[0]
                                            ? response.vans[0].fuel
                                            : "not available"
                                    }" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mx-auto row" id="documents">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" name="role" class="form-control border" id="role"
                            value="${response.role}" hidden required>
                    </div>
                </div>
                `;
                // }
                $("#view-con").html(html);
                var docs = "";
                // response.sort((a, b) => a.id - b.id);
                response.documents.forEach((document, index) => {
                    // if(index < 1){
                    //     docs += `
                    //     <div class="col-sm-6">
                    //         <div class="card border-info">
                    //         <div class="card-body">
                    //             <h5 class="card-title text-info">Profile</h5>
                    //             <img  src="${baseUrl}/storage/profile/tmp/${document.path}" class="rounded mx-auto img-fluid mt-2 img-hover" alt="Image">
                    //         </div>
                    //         </div>
                    //     </div>
                    //         `
                    // }else{
                    const regex = /(?:liscensed|vehicle|profile)(?=\d)/;
                    const matches = document.path.match(regex);

                    let extPath = "profile"; // Default value if the regex doesn't match "licensed" or "vehicle"
                    if (matches && matches.length > 0) {
                        extPath = matches[0];
                    }
                    if (extPath === "profile") {
                        extPath = "profile"; // Set the correct path for "profile"
                    }
                    docs += `
                        <div class="col-sm-4 d-flex flex-column">
                            <div class="card border-info flex-fill">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-info">${extPath}</h5>
                                <img src="${baseUrl}/storage/${extPath}/${document.path}" class="rounded mx-auto img-fluid mt-2 img-hover flex-fill" alt="Image">
                            </div>
                            </div>
                        </div>
                        `;
                    // }
                });
                $("#documents").append(docs);
                $(".img-hover").click(function (event) {
                    // Prevent the click event from propagating to parent elements
                    event.stopPropagation();
                    $(this).toggleClass("scale");
                });
                // Use jQuery to handle the click event on the document
                $(document).click(function () {
                    // Remove the "scale" class from all elements with the "img-hover" class
                    $(".img-hover").removeClass("scale");
                });
            },
        });
    });

    function approve(id) {
        $.ajax({
            url: `/accounts/approval/${id}`,
            method: "GET",
            responseType: "json",
            success: function (response) {
                console.log(response.message);
                if (response.status == "success") {
                    // toastr
                    Command: toastr["success"](
                        `Newly driver registered successfully`
                    );

                    toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        preventDuplicates: true,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        timeOut: "3000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                    FetchNotification();
                }
                // Perform any additional actions or update the UI
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});
