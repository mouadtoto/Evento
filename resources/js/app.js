import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let editevent = document.querySelectorAll('.editevent');
let event = document.getElementById('event');

let categories = document.querySelectorAll('.categories');
let eventtitle = document.querySelectorAll('.eventtitle');
let eventdate = document.querySelectorAll('.eventdate');
let eventdesc = document.querySelectorAll('.editevent');
// let editevent = document.querySelectorAll('.editevent');

closecat.addEventListener("click", e => {
    event.classList.add('hidden');
});
for (let index = 0; index < editevent.length; index++) {
    editevent[index].addEventListener("click", e => {
        event.classList.remove('hidden');
    });
}
