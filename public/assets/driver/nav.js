const body = document.querySelector("body"),
    sidebar = body.querySelector("nav"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text"),
    navLinks = document.querySelectorAll(".nav-link");
const csm8 = document.querySelector(".col-sm-8");

let active = localStorage.getItem("active") || [];
navLinks.forEach((link) => {
    // console.log(link.classList)
    link.addEventListener("click", function (event) {
        // Prevent the default behavior of the link (e.g., following the href)
        //  event.preventDefault();
        localStorage.setItem("active", link.dataset.id);
        // Get the anchor element inside the clicked link
        const activeLink = link.querySelector("a");
        // Remove the "active" class from all links
        navLinks.forEach((link) => {
            link.classList.remove("active");
        });

        // Add the "active" class to the clicked link
        link.classList.add("active");
        // Remove the "activeI" class from all links' anchor elements
        const allLinksAnchors = document.querySelectorAll(".nav-link a");
        allLinksAnchors.forEach((anchor) => {
            anchor.classList.remove("activeI");
        });

        activeLink.classList.add("activeI");
    });
    // link.classList.add('active')
});
// console.log(navLink)
toggle.addEventListener("click", () => {
    // csm8.classList.add('small')
    sidebar.classList.toggle("close");
});

// searchBtn.addEventListener("click", () => {
//     // csm8.classList.remove('small')
//     sidebar.classList.remove("close");
// });

// modeSwitch.addEventListener("click", () => {
//     body.classList.toggle("dark");

//     if (body.classList.contains("dark")) {
//         modeText.innerText = "Light mode";
//     } else {
//         modeText.innerText = "Dark mode";
//     }
// });
setState();
function setState() {
    // Add the "activeI" class to the anchor element inside the clicked link
    const linkActive = document.querySelector(`li[data-id="${active}"]`);
    const activeLink = document.querySelector(`li[data-id="${active}"] a`);
    linkActive.classList.add("active");
    activeLink.classList.add("activeI");
}

