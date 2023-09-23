window.addEventListener('load', function() {
    setTimeout(function() {
        document.querySelector('.animation-container').style.display = 'none';
        showMainContent();
    }, 3000); // Adjust the duration of the animation delay (in milliseconds)
});
