/**
 * ***************************************************************************************
 * Gestion des produits
 * ***************************************************************************************
 */

let products = document.querySelectorAll('.product');

products.forEach(product => {
    product.addEventListener('mouseenter', function() {
        let productImage = product.children[0];
        let text = productImage.children[1];
        
        text.classList.remove('element-hidden');
    });
    
    product.addEventListener('mouseleave', function() {
        let productImage = product.children[0];
        let text = productImage.children[1];
        
        text.classList.add('element-hidden');
    });
});

/**
 * ***************************************************************************************
 * Gestion du message
 * ***************************************************************************************
 */

// let message_div = document.querySelector('#contain-message');
// this.window.addEventListener('load', function() {
//     if (!message_div.classList.contains('hidden')) {
//         message_div.classList.add('animated');
//         setTimeout(function() {
//             message_div.classList.remove('animated');
//             message_div.classList.add('hidden');
//         }, 3000);
//     }
// });

// setTimeout(function() {
//     sessionStorage.clear();
//     localStorage.clear();
// }, 5000);