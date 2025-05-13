<?php 
    // session_start();
    require_once "../app/controllers/productController.php";

    if ($_SESSION['access_key'] !== 'yes') {
        header('location:connexion.php');
    }

    if (isset($_SESSION['message'])) {
        $class = null;
        $message = $_SESSION['message'];
    }
    else {
        $message = null;
        $class = "hidden";
    }
    


    $dir = '../products/';
    if (!is_dir($dir)) {
        mkdir($dir);
    }
    else {
        $rep = scandir($dir);
    }

    $files = getFiles($dir);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Accueil</title>
</head>
<body>
    <?php 
        include "loaders/loader_2.php";
        include "navbar.php";
    ?>
    <div id="space-top">
        <span>Session de <u><?= $_SESSION['email'] ?></u></span>
    </div>

    <div id="container">

        <?php 
            foreach($files as $f):    
                if (count($rep) -2 !== 0):
                    foreach($rep as $file): 
                        list($name, $ext) = explode('.', $file);
                        if ($file !== "." && $file !== ".." && $name === $f['libelle']):
        ?>
        <div class="product">
            <div class="product-image">
                <img src="<?= $dir.$file ?>" alt="image">
                <p id="info" class="element-hidden">
                    <?= $f['description'] ?>
                </p>
            </div>
            <div class="product-info">
                <span class="product-name"><?= $f['libelle'] ?><a href="false_product.php?img=<?= $dir.$file ?>&name=<?= $f['libelle'] ?>&text=<?= $f['description']; ?>&prix=<?= $f['montant'] ?>€" class="fa fa-eye"> : <?= $f['montant'] ?>€</a></span>
                <button class="button"><a href="order-form.php?id=<?= $f['idproduit'] ?>&&img=<?= $dir.$file ?>&name=<?= $f['libelle'] ?>&text=<?= $f['description']; ?>&prix=<?= $f['montant'] ?>">Acheter</a></button>
            </div>
        </div>
        <?php
                        endif;
                    endforeach; 
                endif;
            endforeach; 
        ?>

    </div>
    <!-- <div id="contain-message" class=<?= $class ?>> -->
    <div id="contain-message" class="hidden">
        <div id="success">
            <div id="animation">
                <div></div>
                <div></div>
            </div>
            <span id="span-message"><?= $message ?></span>
        </div>
    </div>

    <footer>
        Copyright &copysr; E-commerce.fr
    </footer>

    <script src="../js/home.js"></script>
    <script src="../js/dev_info.js"></script>
</body>
</html>