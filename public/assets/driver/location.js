console.log('connected')
// Check if the modal was shown previously
const isModalShown = localStorage.getItem("modalShown") || false;
if (!isModalShown) {
    // Automatically open the modal when the page loads
    $(document).ready(function () {
        // Prevent modal from closing when clicked outside
        $("#locationModal").modal({
            backdrop: "static",
            keyboard: false,
        });
        // $("#locationModal").modal("show");
        $("#getlocation").on("click", () => {
            getLocation();
        });
    });
}
// <!-- JavaScript to handle location access -->
const getLocation = () => {
    return new Promise((resolve, reject) => {
        if (navigator.geolocation) {
            navigator.permissions
                .query({ name: "geolocation" })
                .then((permissionStatus) => {
                    if (
                        permissionStatus.state === "prompt" ||
                        permissionStatus.state === "denied"
                    ) {
                        // Prompt for location access or reset the prompt state and then prompt
                        navigator.geolocation.getCurrentPosition(
                            resolve,
                            reject
                        );
                    } else if (permissionStatus.state === "granted") {
                        // Location access already granted
                        navigator.geolocation.getCurrentPosition(
                            resolve,
                            reject
                        );
                    }
                })
                .catch(reject);
        } else {
            reject(new Error("Geolocation is not supported by this browser."));
        }
    });
};

const showError = async (error) => {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("Location access denied by the user.");
            clearInterval(time);

            // init the popups
            $("#getlocation").css("display", "none");
            $("#message").html(
                "Here is the Guidelines for enabling location in browsers"
            );
            $("#ol").html(`
                    <li>
                        <strong>Google Chrome:</strong>
                    <ul>
                    <li>Open Google Chrome on your computer or mobile device.</li>
                    <li>In the top-right corner, click on the three-dot menu (hamburger menu).</li>
                    <li>From the dropdown menu, select "Settings."</li>
                    <li>Scroll down and click on "Privacy and security" in the left-hand side menu.</li>
                    <li>Under "Privacy and security," click on "Site settings."</li>
                    <li>Look for "Location" in the permissions list and click on it.</li>
                    <li>Toggle the switch to enable location access for all sites or click on the "Add" button to allow specific sites to access your location.</li>
                    </ul>
                </li>
                `);
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Location information is unavailable.");
            clearInterval(time);
            break;
        case error.TIMEOUT:
            console.log("The request to get user location timed out.");
            clearInterval(time);
            break;
        case error.UNKNOWN_ERROR:
            console.log(
                "An unknown error occurred while trying to access the user's location."
            );
            clearInterval(time);
            break;
    }
};

const showPosition = (position) => {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    console.log("Latitude: " + latitude + " Longitude: " + longitude);

    clearInterval(time);
    $("#locationModal").modal("hide");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // send request for storing location
    $.ajax({
        url: `/stored-location`,
        method: "POST",
        dataType: "json",
        data: { latitude: latitude, longitude: longitude }, // Send latitude and longitude as data
        success: function (res) {
            console.log(res);
        },
        error: function (err) {
            console.log(err);
        },
    });
};
// Store in session storage that the modal has been shown
localStorage.setItem("modalShown", "true");

const time = setInterval(() => {
    getLocation().then(showPosition).catch(showError);
}, 1000);
