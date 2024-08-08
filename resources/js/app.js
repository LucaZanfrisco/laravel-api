import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// Timer che mostra il messaggio di conferma per 6 secondi
if (document.getElementById('message')) {
    window.addEventListener('load', function () {
        let message = document.getElementById('message');
        this.setInterval(function () {
            message.classList.add('hidden');
        }, 5000)
    })
};

window.onscroll = function () {
    let topHeader = document.getElementById("topHeader");
    let bottomHeader = document.getElementById("bottomHeader");
    let topHeaderHeight = topHeader.offsetHeight;
    console
    if (document.documentElement.scrollTop > topHeaderHeight) {
        topHeader.classList.add("d-none");
        bottomHeader.classList.add("fixHeader");
        document.getElementsByTagName("main")[0].style.paddingTop = bottomHeader.offsetHeight + 'px';
    } else {
        topHeader.classList.remove("d-none");
        bottomHeader.classList.remove("fixHeader");
        document.getElementsByTagName("main")[0].style.paddingTop = "";
    }
}




