<?php 

    if (strpos(strtolower($_SERVER['PHP_SELF']), 'navbar')) {
        header('location:connexion.php');
    }

    function current_page($link) {
        $page = strtolower($_SERVER['PHP_SELF']);

        if (strpos($page, strtolower($link))) {
            return 'current_page';
        }
        else {
            return null;
        }
    }

?>


<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/navbar.css">

<div id="space"></div>

<nav id="container-nav">
    <div id="nav">
        <div id="searchbar">
            <input type="text" name="search" id="search" placeholder="Rechercher..">
            <i class="fa fa-search" id="close"></i>
        </div>
        <div id="links">
            <a href="add_product.php" class="fa fa-plus-circle link <?= current_page('add_product') ?>"></a>
            <a href="home.php" class="fa fa-home link <?= current_page('home') ?>"></a>
            <a href="connexion.php" class="fa fa-user-circle-o link <?= current_page('connexion') ?>"></a>
            <a href="#" class="fa fa-info-circle link" onclick="message()"></a>
        </div>
    </div>
</nav>

<script src="../js/navbar.js"></script>