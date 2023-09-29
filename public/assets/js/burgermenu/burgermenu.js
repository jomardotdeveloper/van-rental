// Burger drop down menu

const dropDownItems = document.querySelector(".dropdown-items");
const hamburgerMenu = document.querySelector(".hamburger-menu");

// Function to toggle hamburger menu items visibility
const dropDown = () => dropDownItems.classList.toggle('not-visible');

// Attach event listener
hamburgerMenu.addEventListener('click', dropDown);