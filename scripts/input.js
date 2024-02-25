const inputs = document.querySelectorAll('.input');

for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', () => {
        if(inputs[i].value.length >= 1) {
            inputs[i].nextElementSibling.classList.add('fixed');
        } else {
            inputs[i].nextElementSibling.classList.remove('fixed');
        }
    })   
}


