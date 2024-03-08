import { formToJSON } from 'axios';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let closewallet = document.getElementById('closewallet');
let wallet = document.getElementById('wallet');
let openwallet = document.getElementById('openwallet');
closewallet.addEventListener('click', e => {
    wallet.style.transition = 'left 0.5s ease';
    wallet.style.left = '-100%';
})
openwallet.addEventListener('click', e => {
    wallet.style.transition = 'left 0.5s ease';
    wallet.style.left = '0%';
})

let ticket = document.querySelectorAll('.ticket');


for (let index = 0; index < ticket.length; index++) {
    ticket[index].addEventListener('click', e => {
        let id = ticket[index].value;
        console.log(id);
        getTicket(id);
    });

}



let editevent = document.querySelectorAll('.editevent');
let title = document.getElementById('title');
let eventid = document.getElementById('eventid');
let description = document.getElementById('description');
let location = document.getElementById('location');
let capacity = document.getElementById('capacity');
let date = document.getElementById('date');
let category = document.getElementById('category');

let categories = document.querySelectorAll('.categories');
let eventtitle = document.querySelectorAll('.eventtitle');
let eventdate = document.querySelectorAll('.eventdate');
let eventdesc = document.querySelectorAll('.eventdesc');
let capacities = document.querySelectorAll('.capacities');
let locations = document.querySelectorAll('.locations');

let event = document.getElementById('event');

closecat.addEventListener("click", e => {
    event.classList.add('hidden');
});
for (let index = 0; index < editevent.length; index++) {
    editevent[index].addEventListener("click", e => {
        event.classList.remove('hidden');
        console.log(eventtitle[index].innerText);
        eventid.value = editevent[index].value;
        title.value = eventtitle[index].innerText;
        description.value = eventdesc[index].innerText;
        location.value = locations[index].innerText;
        date.value = eventdate[index].innerText;
        capacity.value = capacities[index].innerText;
        category.value = categories[index].value;
        category.innerText = categories[index].innerText;
    });
}



 



