// Script Abir modal en Dashboard.php

const OpenModalButton = document.getElementById('dashboard-open-reminder-modal')
const Modal = document.getElementById('ReminderModal')
const CloseSpan = document.getElementsByClassName('dashboard-reminder-modal-close')[0];

OpenModalButton.addEventListener('click', () => {
    Modal.style.display = 'block';
})

CloseSpan.addEventListener('click', () => {
    Modal.style.display = 'none';
})

window.addEventListener('click', (event) =>{
    if(event.target == Modal){
        Modal.style.display = 'none';
    }
})
