window.addEventListener('load', function() {
    const loader = document.querySelector('.modal-loader');
    // const account_loader = document.querySelector('.acount-container');
    // account_loader.style.display = 'none'
    if (loader) {
        setTimeout(function() {
        loader.style.display = 'none';
        // account_loader.style.display = 'block'
        }, 2000); // Adjust the delay (in milliseconds) as needed
    }
});