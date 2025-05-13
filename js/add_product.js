let text = document.querySelector('textarea');

text.addEventListener('keydown', function() {
    if (text.value.length >= 100) {
        text.disabled = true;
        alert('Limite atteinte. \n Si vous souhaitez modifier cliquez sur "Ajouter un produit"');
    }
});

document.querySelector('h1').addEventListener('click', function() {
    text.value = null;
    text.disabled = false;
});