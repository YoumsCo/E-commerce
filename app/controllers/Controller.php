<?php

    if (file_get_contents('php://input')) {
        $data = json_decode(file_get_contents('php://input'), true);

        if ($data['asking'] === "dev") {
            $datas = [
                "nom" => "Youmbi Le-duc",
                "email" => "youmsc.co@gmail.com",
                "contact" => "690552385",
            ];
            echo json_encode($datas);
        }
    }
    else {
        header('location:../../views/connexion.php');
    }