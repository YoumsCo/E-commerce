<?php
    session_start();

    if ($_SESSION['access_key'] !== 'yes') {
        header('location:connexion.php');
    }

    if (!isset($_GET['id'])) {
        header('location:'.$_SERVER["HTTP_REFERER"]);
    }
    elseif (!isset($_GET['img'])) {
        header('location:'.$_SERVER["HTTP_REFERER"]);
    }
    elseif (!isset($_GET['name'])) {
        header('location:'.$_SERVER["HTTP_REFERER"]);
    }
    elseif (!isset($_GET['text'])) {
        header('location:'.$_SERVER["HTTP_REFERER"]);
    }
    elseif (!isset($_GET['prix'])) {
        header('location:'.$_SERVER["HTTP_REFERER"]);
    }
    else {
        $id = $_GET['id'];
        $img = $_GET['img'];
        $name = $_GET['name'];
        $text = $_GET['text'];
        $prix = $_GET['prix'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/false_product.css">
    <title>Order : <?= $name ?></title>
</head>
<body>
    <?php 
        include "loaders/loader_2.php";
    ?>

    <div id="space-top"></div>

    <div id="container">

        <div id="product">
            <div id="product-image">
                <img src="<?= $img ?>" alt="image">
            </div>
            <div id="info-buy">
                <p id="product-info">
                    <?= $text ?>
                </p>
                <div id="product-buying">
                    <span id="name"><?= $name ?></span>
                    <button type="button">Acheter : <?= $prix ?>€</button>
                    <form action="../app/controllers/productController.php" method="POST" style="display: none;">
                        <input type="hidden" name="id_product" value="<?= $id ?>">
                        <input type="submit" name="order" id="order">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
    <script src="../js/dev_info.js"></script>
    <script src="../js/order.js"></script>
</body>
</html>