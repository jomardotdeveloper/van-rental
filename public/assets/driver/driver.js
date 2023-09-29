console.log($(".driver-id").val());
const profile = $(".driver-profile");
const baseUrl = `${window.location.protocol}//${window.location.hostname}:${window.location.port}`;
// get driver credentials
const driverCredentials = async () => {
    const id = $(".driver-id").val();
    var html = "";
    $.ajax({
        url: `/accounts/view/${id}`,
        method: "GET",
        dataType: "json",
        success: function (res) {
            // console.log(res);
            registrationVehicle(res);
            if (res.is_activated != 0) {
                $("#status").html(
                    '<b class="bg-success p-1">Deployed Vehicle</b>'
                );
            } else {
                $("#status").html(
                    '<b class="bg-warning p-1">Pending Registration</b>'
                );
            }
            profile.attr(
                "src",
                `${baseUrl}/storage/profile/${res.documents[0].path}`
            );
        },
        error: function (err) {
            console.log(err);
        },
    });
};
driverCredentials();
setInterval(() => {
    driverCredentials();
}, 3000);

// get the driver registration form
const registrationVehicle = async (data) => {
    // console.log(data);
    // When the link with id="openModalLink" is clicked, open the modal with id="myModal"
    $("#vehicle-status").on("click", function () {
        // Set the backdrop option to 'static' to prevent closing when clicking outside
        $("#vehicleModal").modal({
            backdrop: "static",
            keyboard: false, // Optional: Disable closing the modal with the keyboard
        });
        $("#vehicleModal").modal("show");
        var html = "";
        // if(response.status == 'success'){
        // $('#viewModal').modal('show');
        // console.log(response)
        // profile = `{{ asset(storage/profile/tmp/$data[0].path))  }}`;
        html = `<div class="col-md-8">
                    <span><b>Basic Information</b></span>
                    <div class="col-md-12 row border rounded p-2">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="firstName" class='text-secondary'><b>First Name</b></label>
                                <input type="text" name="firstName" class="form-control border-info text-info" id="firstName"
                                    placeholder="First Name" value="${
                                        data.firstname
                                    }" required>
                                <input type="text" name="id" class="form-control border-info text-info"
                                    placeholder="ID" value="${data.id}" hidden>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="lastName" class='text-secondary'><b>Last Name</b></label>
                                <input type="text" name="lastName" class="form-control border-info text-info" id="lastName"
                                    placeholder="Last Name" value="${
                                        data.lastname
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Middle Name</b></label>
                                <input type="text" name="middleName" class="form-control border-info text-info" id="middleName"
                                    placeholder="Middle Name" value="${
                                        data.middlename
                                    }">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="lastName" class='text-secondary'><b>Gender</b></label>
                                <input type="text" name="gender" class="form-control border-info text-info" id="gender"
                                    placeholder="Gender" value="${
                                        data.gender
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Age</b></label>
                                <input type="number" name="age" class="form-control border-info text-info" id="age"
                                    placeholder="Age" value="${
                                        data.age
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Birthdate</b></label>
                                <input type="text" name="birthplace" class="form-control border-info text-info" id="birthplace"
                                    placeholder="Birthplace" value="${
                                        data.birthdate
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Nationality</b></label>
                                <input type="text" name="nationality" class="form-control border-info text-info" id="nationality"
                                    placeholder="Nationality" value="${
                                        data.nationality
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Contact</b></label>
                                <input type="tel" name="contact" class="form-control border-info text-info" id="contact"
                                    placeholder="Contact: +63" required pattern="[0-9]{10}"
                                    title="Please enter a valid 10-digit mobile number" value="${
                                        data.contact
                                    }">
                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Email</b></label>
                                <input type="email" name="email" class="form-control border-info text-info" id="email"
                                    placeholder="Email" value="${
                                        data.email
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Birthdate</b></label>
                                <input type="date" name="birthdate" class="form-control border-info text-info" id="birthdate"
                                    placeholder="Birthdate" value="${
                                        data.birthdate
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Municipality</b></label>
                                <input type="text" name="municipality" class="form-control border-info text-info" id="municipality"
                                    placeholder="Municipality" value="${
                                        data.municipality
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Zip Code</b></label>
                                <input type="number" name="zipcode" class="form-control border-info text-info" id="zipcode"
                                    placeholder="Zip Code" value="${
                                        data.zipcode
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Barangay</b></label>
                                <input type="text" name="barangay" class="form-control border-info text-info" id="barangay"
                                    placeholder="Barangay" value="${
                                        data.barangay
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Street</b></label>
                                <input type="text" name="street" class="form-control border-info text-info" id="street"
                                    placeholder="Street" value="${
                                        data.street
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
                                        data.vans[0]
                                            ? data.vans[0].companyname
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Id No.</b></label>
                                <input type="number" name="idNumber" class="form-control border-info text-info" id="idNumber"
                                    placeholder="ID NO." value="${
                                        data.idno
                                    }" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>ORCR</b></label>
                                <input type="number" name="orcr" class="form-control border-info text-info" id="orcr"
                                    placeholder="ORCR" value="${
                                        data.orcr
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="lastName" class='text-secondary'><b>Plate Number</b></label>
                                <input type="text" name="plateNumber" class="form-control border-info text-info" id="plateNumber"
                                    placeholder="Vehicle Plate Number" value="${
                                        data.platenumber
                                            ? data.platenumber
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="Ac" class='text-secondary'><b>Aircon Type</b></label>
                                <input type="text" name="ac" class="form-control border-info text-info" id="ac"
                                    placeholder="Aircon Type" value="${
                                        data.vans[0]
                                            ? data.vans[0].ac
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="bags" class='text-secondary'><b>Bags</b></label>
                                <input type="number" name="bags" class="form-control border-info text-info" id="bags"
                                    placeholder="Bags" value="${
                                        data.vans[0]
                                            ? data.vans[0].bag
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="seats" class='text-secondary'><b>Seats</b></label>
                                <input type="number" name="seats" class="form-control border-info text-info" id="seats"
                                    placeholder="Seats" value="${
                                        data.vans[0]
                                            ? data.vans[0].seat
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="model" class='text-secondary'><b>Model</b></label>
                                <input type="text" name="model" class="form-control border-info text-info" id="model"
                                    placeholder="Model" value="${
                                        data.vans[0]
                                            ? data.vans[0].model
                                            : "not available"
                                    }" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="fuel" class='text-secondary'><b>Fuel</b></label>
                                <input type="text" name="fuel" class="form-control border-info text-info" id="fuel"
                                    placeholder="Seats" value="${
                                        data.vans[0]
                                            ? data.vans[0].fuel
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
                            value="${data.role}" hidden required>
                    </div>
                </div>
                `;

        $("#view-vehicle-status").html(html);

        var docs = "";
        data.documents.forEach((document, index) => {
            // console.log(document);
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

            if (document.is_activated == 0) {
                $("#stats")
                    .html("<b>Your Application is Pending for approval.</b>")
                    .addClass("bg-danger p-2 border rounded");
            } else {
                $("#stats")
                    .html("<b>Your Application is Approved by Van Rental.</b>")
                    .addClass("bg-white text-info p-2 border rounded");
            }
        });
        $("#documents").html(docs);

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
    });
};

const updateRegistration = async () => {
    $("#update").on("click", function () {
        $.ajax({
            url: `/register-edit`,
            method: "POST",
            dataType: "json",
            data: $("#edit-form").serialize(),
            success: function (res) {
                var msg = "";
                // console.log(res);
                console.log("HAHHAHAHAHA");
                $("#msg")
                    .html(res.message)
                    .addClass("bg-success p-2 border rounded");
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
};

updateRegistration();
