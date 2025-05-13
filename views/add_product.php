<?php 

    session_start();

    if ($_SESSION['access_key'] !== 'yes') {
        header('location:connexion.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add._product.css">
    <title>Add product</title>
</head>
<body>
    <?php include "loaders/loader_2.php";  ?>
    <form action="../app/controllers/productController.php" method="post" enctype="multipart/form-data">
        <div>
            <marquee behavior="alternate" direction="left">
                <h1>Ajouter un produit</h1>
            </marquee>
        </div>
        <div>
            <label for="name">Nom du produit</label>
            <input type="text" name="name" placeholder="Nom du produit" required>
        </div>
        <div>
            <label for="name">Prix du produit</label>
            <input type="number" name="prix" min="1" max="10000" placeholder="Prix du produit" required>
        </div>
        <div>
            <label for="name">Informations du produit</label>
            <br>
            <textarea name="info" id="info" rows="10" cols="10" required></textarea>
        </div>
        <div>
            <input type="file" name="file" id="file" accept=".jpeg, .jpg, .png" required>
        </div>
        <div>
            <button type="submit" name="send">Ajouter</button>
        </div>
    </form>
    
    <script src="../js/dev_info.js"></script>
    <script src="../js/add_product.js"></script>
</body>
</html>