<?php

    if (file_get_contents("php://input") && require_once("session.php")) {
        $datas = json_decode(file_get_contents("php://input"), true);
        
        if ($datas['action'] === "registration") {
            require_once "../models/User.php";
    
            $user = new User();
            $insert = $user->insert($datas['name'], $datas['mail'], $datas['pass'], "user");
            if ($insert === "created") {
                $_SESSION['access_key'] = 'yes';
                $_SESSION['email'] = $datas['mail'];
                echo json_encode(["statut" => "success"]);
            }
            else {
                echo json_encode(["statut" => "Cet utilisateur existe déjà"]);
            }
        }
        elseif ($datas['action'] === "authentification") {
            require_once "../models/User.php";
    
            $user = new User();
            $check = $user->check($datas['mail'], md5($datas['pass']));
            if ($check === true) {
                $_SESSION['access_key'] = 'yes';
                $_SESSION['email'] = $datas['mail'];
                echo json_encode(["statut" => "found"]);
            }
            else {
                echo json_encode(["statut" => "Authentification echouée"]); 
            }
        }
    }
    else {
        $location = "/E-commerce/views/connexion.php";
        header('location:'.$location);
    }
