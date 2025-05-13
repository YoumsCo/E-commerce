<?php

    require_once "Database.php";

    class Produit {
        private static $db;
        private static $pdo;

        function __construct() {
            self::$db = new Database();
            self::$pdo = self::$db->returnPDO();
        }

        function insert($libelle, $montant, $description): bool {
            $statut = false;
            try {
                $stmt = self::$pdo->prepare('insert into produit(libelle, montant, description) values(?, ?, ?)');
                $stmt->execute([$libelle, $montant, $description]);

                $statut = true;
            }catch(Exception $e) {
                die('Erreur  : '. $e->getMessage() .'. A la ligne : '. $e->getLine() .' , du fichier : '. $e->getFile());
            }
            
            return $statut;
        }
        
        function attach($email, $id) {
            $statut = false;
            try {
                $stmt = self::$pdo->prepare('insert into acheter(iduser, idproduit) values(?, ?)');
                $stmt->execute([$email, $id]);
    
                $statut = true;
            }catch(Exception $e) {
                die('Erreur  : '. $e->getMessage() .'. A la ligne : '. $e->getLine() .' , du fichier : '. $e->getFile());
            }
            
            return $statut;
        }
        
        function check() {
            try {
                $stmt = self::$pdo->prepare('select * from produit order by libelle');
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e) {
                die('Erreur  : '. $e->getMessage() .'. A la ligne : '. $e->getLine() .' , du fichier : '. $e->getFile());
            }
        }
}