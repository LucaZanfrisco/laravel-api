import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// Timer che mostra il messaggio di conferma per 6 secondi
if(document.getElementById('message')){
    window.addEventListener('load',function(){
    let message = document.getElementById('message');
    this.setInterval(function(){
        message.classList.add('hidden');
    },5000)
})
}
