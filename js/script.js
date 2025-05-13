// *************************** Script des formulaires ***************************

let container = document.querySelector('#container')
let button = document.querySelectorAll('.button')

for (let i = 0; i < button.length; i++) {
    button[i].addEventListener('click', function () {
        container.classList.toggle('active-container');
    })
}

// ************************************************************************************
// Mot de passe du formaulaire d'inscription
// ************************************************************************************
let eyeSignUp = document.querySelectorAll('.fa-eye')[0];
let passwordSignUp = document.querySelectorAll("[type='password']")[0];
eyeSignUp.addEventListener('click', function () {
    if (passwordSignUp.type === 'text') {
        passwordSignUp.type = "password";
        eyeSignUp.classList.replace('fa-eye-slash', 'fa-eye');
    }
    else if (passwordSignUp.type === 'password') {
        passwordSignUp.type = "text";
        eyeSignUp.classList.replace('fa-eye', 'fa-eye-slash');
    }
});


// ************************************************************************************
// Mot de passe du formaulaire de connexion
// ************************************************************************************

let eyeLogin = document.querySelectorAll('.fa-eye')[1];
let passwordLogin = document.querySelectorAll("[type='password']")[1];
eyeLogin.addEventListener('click', function () {
    if (passwordLogin.type === 'text') {
        passwordLogin.type = "password";
        eyeLogin.classList.replace('fa-eye-slash', 'fa-eye');
    }
    else if (passwordLogin.type === 'password') {
        passwordLogin.type = "text";
        eyeLogin.classList.replace('fa-eye', 'fa-eye-slash');
    }
});


// ************************************************************************************
// Mot de passe des formaulaires en vue androide
// ************************************************************************************

let links = document.querySelectorAll(".link-form");

links.forEach(link => {
    link.addEventListener("click", function () {
        container.classList.toggle('active-container');
    });
});


/**
 * **************************************************************************************
 * Envoie des données du formulaire au script php
 * **************************************************************************************
 */

let register_form = document.querySelector('#register_form');
let login_form = document.querySelector('#login_form');

register_form.addEventListener('submit', function (e) {
    e.preventDefault();
    let nom = document.querySelector('#name').value;
    let email = document.querySelector('#register_email').value;
    let password = document.querySelector('#register_password').value;

    fetch("/E-commerce/app/controllers/UserController.php", {
        method: "POST",
        headers: { "content-Type": "application/json" },
        body: JSON.stringify({
            name: nom,
            mail: email,
            pass: password,
            action: "registration"
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data["statut"] === "success") {
                document.querySelector('#span-message').innerHTML = "Bienvenue 😉";
                let div_message = document.querySelector('#contain-message');
                div_message.classList.remove('hidden');
                setTimeout(() => {
                    div_message.classList.add('animated');
                }, 150)
                setTimeout(() => {
                    div_message.classList.add('hidden');
                    div_message.classList.remove('animated');
                    document.location.href = "/E-commerce/views/home.php";
                }, 2500)
            }
            else {
                alert(data['statut']);
            }
        })
        .catch(error => console.error(error));

});

login_form.addEventListener('submit', function (e) {
    e.preventDefault();

    let email = document.querySelector('#login_email').value;
    let password = document.querySelector('#login_password').value;

    fetch("/E-commerce/app/controllers/UserController.php", {
        method: "POST",
        headers: { "content-Type": "application/json" },
        body: JSON.stringify({
            mail: email,
            pass: password,
            action: "authentification"
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data["statut"] === "found") {
                document.querySelector('#span-message').innerHTML = "Connexion établie";
                let div_message = document.querySelector('#contain-message');
                div_message.classList.remove('hidden');
                setTimeout(() => {
                    div_message.classList.add('animated');
                }, 150)
                setTimeout(() => {
                    div_message.classList.add('hidden');
                    div_message.classList.remove('animated');
                    document.location.href = "/E-commerce/views/home.php";
                }, 2500)
            }
            else {
                alert(data["statut"]);
            }
        })
        .catch(error => console.error(error));

});

/**
 **************************************************************************************
 Autre
 **************************************************************************************
 */

document.querySelectorAll('.auth_provider').forEach(item => {
    item.addEventListener("click", function () {
        alert('Indisponible pour le moment');
    });
});
