tinymce.init({
    selector: '.tiny_text',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
    content_style: "body {font-size: 18px; font-family: Arial, Helvetica, sans-serif; background-color: transparent; }",
    language: 'fr_FR'
});

//======================     Go to top button    ======================//

//Gets the button
var mybutton = document.getElementById("GoToTopBtn");

//Shows the button When the user scrolls down 150px from the top
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

//Scrolls to the top when the user clicks on the button
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}