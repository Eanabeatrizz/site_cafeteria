document.querySelectorAll('.favorite-button').forEach(button => {
    button.addEventListener('click', function() {
        if(this.textContent === '❤' ) {
            this.textContent = '🧡'; //muda o ícone ao clicar
        } else {
            this.textContent = '❤';
        }
    });
});

document.querySelectorAll('.receitas-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.backgroundColor = '#5e4035'; // Muda cor ao passar o mouse
    });
    card.addEventListener('mouseleave', function() {
        this.style.backgroundColor = '#241a1c'; // Volta à cor original
    });
});