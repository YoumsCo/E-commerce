fetch('/E-commerce/app/controllers/Controller.php', {
    method: "POST",
    headers: {'content-Type' : 'application/json'},
    body: JSON.stringify({
        asking : 'dev'
    })
})
.then(response => response.json())
.then(datas => {
    console.log(datas);
})
.catch(error => console.error(error));