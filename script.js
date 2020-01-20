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