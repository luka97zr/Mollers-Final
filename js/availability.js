const openModalBtn = document.querySelectorAll('[data-modal-target]');
const closeModalBtn = document.querySelectorAll('[data-close-button]');
const detail_overlay = document.getElementById('detail_overlay');

openModalBtn.forEach(button => {
    button.addEventListener('click', () => {
        const detail_modal = document.querySelector(button.dataset.modalTarget)
        openModal(detail_modal);
    })
})
detail_overlay.addEventListener('click', () => {
    const deatail_modals = document.querySelectorAll('detail_modal.open')
    detail_modals.forEach(detail_modal => {
        closeModal(detail_modal)
    })
})
closeModalBtn.forEach(button => {
    button.addEventListener('click', () => {
        const detail_modal = button.closest('.detail_modal')
        closeModal(detail_modal)
    })
})
function openModal(detail_modal){
    if(detail_modal == null) return
    detail_modal.classList.add('open')
    overlay.classList.add('open')
}
function closeModal(modal){
    if(detail_modal==null) return
    detail_modal.classList.remove('open')
    overlay.classList.remove('open')
}
