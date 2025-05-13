<?php
    require_once "session.php";
    /**
     * **********************************************************************************
     * Gestion de l'insertion d'un nouveau produit
     * **********************************************************************************
     */

    if (isset($_POST['send'])) {
        require_once "../models/Produit.php";

        if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $dir = "../../products/";
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            $extension = substr($file_type, 6);
            $new_rep = $dir.$_POST['name']. '.' .$extension;
            if (move_uploaded_file($file_tmp, $new_rep)) {
                $produit = new Produit();
                if ($produit->insert($_POST['name'], $_POST['prix'], $_POST['info'])) {
                    // $_SESSION['message'] = 'Succès';
                    // header('location:../../views/home.php');
                    echo "<script>
                        alert('Produit ajouté avec succès');
                        document.location.href = '../../views/home.php';
                    </script>"; 
                }
                else {
                    header('location:'. $_SERVER['HTTP_REFERER']);
                }
            }
            else {
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }

    /** 
     * **********************************************************************************
     * Gestion de la recupération des images des produits
     * **********************************************************************************
     */
    
    function getFiles ($rep): array {
        $array = [];
        if (!is_dir($rep)) {
            mkdir($rep, 755);
        }
        $dir = scandir($rep);
        if (count($dir) - 2 !== 0) {
            require_once "../app/models/Produit.php";
            $product = new Produit();
            $files = $product->check();

            foreach($dir as $d) {
                foreach($files as $element) {
                    list($name, $ext) = explode('.', $d);
                    if ($name === $element['libelle']) {
                        array_push($array, $element);
                    }
                }
            }
        }
        
        return $array;
    }
    
    
    /** 
     * **********************************************************************************
     * Gestion de la commande d'un porduit
     * **********************************************************************************
     */

    if (isset($_POST['order'])) {
        require_once "../models/User.php";
        require_once "../models/Produit.php";

        $user = new User();
        $product = new Produit();
        
        foreach($user->get_one($_SESSION['email']) as $element => $value) {
            if($product->attach($value, $_POST['id_product'])) {
                // $_SESSION['message'] = "Commande effectuée";
                // header('location:../../views/home.php');

                echo "<script>
                    alert('Commande effectuée avec succès');
                    document.location.href = '../../views/home.php';
                </script>";
            }
        }

    }