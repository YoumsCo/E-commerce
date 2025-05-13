/**
 * ***************************************************************************************
 * Gestion de la barrde recherche
 * ***************************************************************************************
 */

let search = document.querySelector('#search');

search.addEventListener('keyup', function() {
    let productName = document.querySelectorAll('.product-name');
    
    if (search.value !== null) {
        let icon = search.nextElementSibling;
        
        icon.classList.replace('fa-search', 'fa-close');
    }
    
    for(let i = 0; i < productName.length; i++) {
        let name = productName[i];
        let product = name.closest('.product');
        if (name.innerHTML.toLowerCase().indexOf(search.value.toLowerCase()) === -1) {
            
            product.classList.add('element-hidden');
            setTimeout(() => {
                product.style.display = 'none';
            }, 1000);
        }
        else {
            product.classList.contains('element-hidden') ? product.classList.remove('element-hidden') : '';;
            product.style.display = 'flex';
            product.classList.add('product-found');
        }
    }
});

search.addEventListener('click', function() {
    if (search.value !== '') {
        let productName = document.querySelectorAll('.product-name');
    
        if (search.value !== null) {
            let icon = search.nextElementSibling;
            
            icon.classList.replace('fa-search', 'fa-close');
        }
        
        for(let i = 0; i < productName.length; i++) {
            let name = productName[i];
            let product = name.closest('.product');
            if (name.innerHTML.toLowerCase().indexOf(search.value.toLowerCase()) === -1) {
                
                product.classList.add('element-hidden');
                setTimeout(() => {
                    product.style.display = 'none';
                }, 500);
            }
            else {
                product.classList.contains('element-hidden') ? product.classList.remove('element-hidden') : '';;
                product.style.display = 'flex';
                product.classList.add('product-found');
            }
        }
    }
});

search.addEventListener('focusout', function() {
    let products = document.querySelectorAll('.product');
    let icon = search.nextElementSibling;

    icon.classList.replace('fa-close', 'fa-search');
    products.forEach(product => {
        product.classList.contains('element-hidden') ? product.classList.remove('element-hidden') : '';
        product.classList.contains('product-found') ? product.classList.remove('product-found') : '';
    });
});

document.querySelector('#close').addEventListener('click', function() {
    let products = document.querySelectorAll('.product');
    let icon = search.nextElementSibling;

    icon.classList.replace('fa-close', 'fa-search');

    search.value = '';
    products.forEach(product => {
        product.classList.contains('element-hidden') ? product.classList.remove('element-hidden') : undefined;
        product.classList.contains('product-found') ? product.classList.remove('product-found') : undefined;
        product.style.display = "flex";
    });
});

/**
 * ***************************************************************************************
 * Gestion des liens
 * ***************************************************************************************
 */

let links = document.querySelectorAll(".link");

links.forEach(item => {
    item.addEventListener('click', function(e) {
        let url = item.href;
        e.preventDefault();
        if (item.classList.contains("current_page")) {
            alert('Vous etes déjà sur la page que vous souhaitez accéder');
            if (confirm('Souhaitez vous actualiser cette page ?')) {
                document.location.href = url;
            }
        }
        else if (item.className.indexOf("user") !== -1) {
            alert("Vous etes sur le point d'acceder à la page de connexion");
            if (confirm('⚠ Est-ce vraiment votre choix ? Si oui vous ne pourrez revenir sur cette page et sur les autres que si vous vous etes de nouveau authentifié ⚠')) {
                document.location.href = url;
            }
        }
        else {
            document.location.href = url;
        }
    });
});

/**
 * ***************************************************************************************
 * Autres
 * ***************************************************************************************
 */

const message = () => alert('Indisponible');