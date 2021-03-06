// Bouton retour en haut

mybutton = document.getElementById("myBtn");
window.addEventListener("scroll", function () {
    if (document.documentElement.scrollTop > 200) {
        mybutton.style.bottom = "30px";
    } else {
        mybutton.style.bottom = "-100px";
    }
});

function topFunction() {
    $("html").animate({ scrollTop: "0" }, "600");
}

// AJAX Référence


class LinkedSelect {

    constructor(select) {
        this.select = select
        this.onChange = this.onChange.bind(this)
        this.select.addEventListener('change', this.onChange)
    }

    onChange(e) {
        let request = new XMLHttpRequest()
        request.open('GET', this.select.dataset.source.replace('$id', e.target.value), true)
        request.onload = () => {
            if (request.status >= 200 && request.status < 400) {
                let data = JSON.parse(request.responseText)
                let options = data.reduce(function (acc, option) {
                    return acc + '<option value="' + option.id + '">' + option.value + '</option>'
                }, '')
                let target = document.querySelector(this.select.dataset.target)
                target.innerHTML = options
            } else {
                alert('Impossible')
            }
        }
        request.onerror = function () {
            alert('Impossible de charger la liste')
        }
        request.send()
    }
}


let selects = document.querySelectorAll('.linked-select')
selects.forEach(function (select) {
    new LinkedSelect(select)
})


// AJAX Formulaire 


$(function () {

    $('#contact-form').submit(function (e) {

        e.preventDefault();
        $('.error').empty();
        let postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: 'verif.php',
            data: postdata,
            dataType: 'json',
            success: function (result) {
                if (result.isSuccess) {
                    $("#contact-form").append("<p class='thank-you'>Votre message a bien été envoyé.</p>");
                    $("#contact-form")[0].reset();
                }
                else {
                    $("#prenom ~ .error").html(result.prenomError);
                    $("#nom ~ .error").html(result.nomError);
                    $("#mail ~ .error").html(result.mailError);
                    $("#telephone ~ .error").html(result.telephoneError);
                    $("#message ~ .error").html(result.messageError);
                }
            }
        });

    });



})


// Apparition au défilement

const ratio = .1;

const options = {
    root: null,
    rootMargin: "0px",
    threshold: ratio
}

const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible');
            observer.unobserve(entry.target);
        }
    })
}

const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
    observer.observe(r);
})

// Carousel slick home page

$(document).ready(function () {
    $('.my-carousel').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        fade: true,
        cssEase: 'linear',
        pauseOnHover: false,
    });
});

// Carousel slick page voiture

$('.responsive').slick({
    arrows: true,
    nextArrow: '<div class="slick-next"></div>',
    prevArrow: '<div class="slick-prev"></div>',
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear',
    pauseOnHover: true,
});

// Redirection après formulaires
if (document.querySelector("#hidden-checker")) {
    if (document.querySelector("#hidden-checker").value == "1") {
        window.location.href = "http://www.cilkauto.fr/caiultko/index.php";
    }
}

if (document.querySelector("#hidden-checker-insert")) {
    if (document.querySelector("#hidden-checker-insert").value == "1") {
        window.location.href = "http://www.cilkauto.fr/caiultko/index.php";
    }
}

if (document.querySelector('#hidden-checker-delete')) {
    if (document.querySelector('#hidden-checker-delete').value == '1') {
        window.location.href = "http://cilkauto.fr/caiultko/index.php";
    }
}

// Remove modal - mobile

$('#exampleModal').on('show.bs.modal', function () {
    var width = $(window).width();
    if (width < 768) {
        $('#exampleModal').modal('hide');
    }
});