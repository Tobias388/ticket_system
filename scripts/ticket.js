const difficulty = document.querySelector('.ticket_difficulty');
const url = 'https://api.giphy.com/v1/gifs/categories?api_key=';
const api_key = 'R58w7iv0Xa5VKXhc0pKkgnK27ayqNuGw';

fetch(url + api_key)
    .then(res => res.json())
    .then(data => {

        const ticket_gif = document.querySelectorAll('.ticket_gif')
        const ticket_difficulty = document.querySelectorAll('.ticket_difficulty')
        const gif_easy = data.data[5].gif.images.downsized_large.url;
        const gif_medium = data.data[10].gif.images.downsized_large.url;
        const gif_hard = data.data[3].gif.images.downsized_large.url;


        for (let i = 0; i < ticket_gif.length; i++) {
            if (ticket_difficulty[i].innerHTML === 'Fácil') {
                ticket_difficulty[i].classList.add('easy');
                ticket_gif[i].setAttribute('src', gif_easy);
                tickets[i].classList.add('Fácil');
            } else if (ticket_difficulty[i].innerHTML === 'Media') {
                ticket_difficulty[i].classList.add('medium');
                ticket_gif[i].setAttribute('src', gif_medium)
                tickets[i].classList.add('Media');
            } else {
                ticket_difficulty[i].classList.add('hard');
                ticket_gif[i].setAttribute('src', gif_hard)
                tickets[i].classList.add('Difícil');
            }
        }
    })