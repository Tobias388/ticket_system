const filter_btn_easy = document.getElementById('filter_easy');
const filter_btn_medium = document.getElementById('filter_medium');
const filter_btn_hard = document.getElementById('filter_hard');
const filter_btn_all = document.getElementById('filter_all');
const tickets = document.querySelectorAll('.ticket');

filter_btn_easy.addEventListener('click', () => {
    filter_btn_easy.classList.add('active');
    filter_btn_medium.classList.remove('active');
    filter_btn_hard.classList.remove('active');
    filter_btn_all.classList.remove('active');

    for (let i = 0; i < tickets.length; i++) {
        if(tickets[i].classList.contains('Fácil')) {
            tickets[i].classList.remove('hidden');
        } else {
            tickets[i].classList.add('hidden');
            tickets[i].classList.add('hidden');
        }
    }
})

filter_btn_medium.addEventListener('click', () => {
    filter_btn_easy.classList.remove('active');
    filter_btn_medium.classList.add('active');
    filter_btn_hard.classList.remove('active');
    filter_btn_all.classList.remove('active');

    for (let i = 0; i < tickets.length; i++) {
        if(tickets[i].classList.contains('Media')) {
            tickets[i].classList.remove('hidden');
        } else {
            tickets[i].classList.add('hidden');
            tickets[i].classList.add('hidden');
        }
    }
})

filter_btn_hard.addEventListener('click', () => {
    filter_btn_easy.classList.remove('active');
    filter_btn_medium.classList.remove('active');
    filter_btn_hard.classList.add('active');
    filter_btn_all.classList.remove('active');

    for (let i = 0; i < tickets.length; i++) {
        if(tickets[i].classList.contains('Difícil')) {
            tickets[i].classList.remove('hidden');
        } else {
            tickets[i].classList.add('hidden');
            tickets[i].classList.add('hidden');
        }
    }
})

filter_btn_all.addEventListener('click', () => {
    filter_btn_easy.classList.remove('active');
    filter_btn_medium.classList.remove('active');
    filter_btn_hard.classList.remove('active');
    filter_btn_all.classList.add('active');

    for (let i = 0; i < tickets.length; i++) {
        tickets[i].classList.remove('hidden');
    }
})