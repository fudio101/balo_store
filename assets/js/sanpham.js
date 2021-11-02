var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("js-myslide");
    var dots = document.getElementsByClassName("js-hiden");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        // console.log(slides[i])
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

$(".container-form__add-sub").click(() => {
    var val = $(".fix-number").val();
    if (val > 1) {
        $(".fix-number").val(parseInt(val - 1), 10);
    }
});

$(".container-form__add-sub1").click(() => {
    $(".fix-number").val(parseInt($(".fix-number").val(), 10) + 1);
});
