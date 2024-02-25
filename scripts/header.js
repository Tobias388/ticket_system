const header_btn = document.querySelector('.header_btn_container');
const header = document.querySelector('.header');
const overlay = document.querySelector('.overlay');

header_btn.addEventListener('click', () => {
    header_btn.classList.toggle('active');
    header.classList.toggle('active');
    overlay.classList.toggle('active');
})
overlay.addEventListener('click', () => {
    header_btn.classList.remove('active');
    header.classList.remove('active');
    overlay.classList.remove('active');
})