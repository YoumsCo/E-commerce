<?php

    // namespace App\Models;
    // use App\Models\Database;

    require_once "Database.php";

    class User {
        private static $db;
        private static $pdo;

        function __construct() {
            self::$db = new Database();
            self::$pdo = self::$db->returnPDO();
        }

        function getUsers(){
            try {
                $users = self::$pdo->prepare("select * from user order by nom");
                $users->execute();
                return $users->fetchAll();

            } catch(Exception $e) {
                die("Connexion echouée ". $e->getMessage() .". A la ligne : ". $e->getLine(). ", du fichier : ". $e->getFile());
            }
        }

        function get_one($email){
            try {
                $users = self::$pdo->prepare("select iduser from user where email = ?");
                $users->execute([$email]);
                return $users->fetch();

            } catch(Exception $e) {
                die("Connexion echouée ". $e->getMessage() .". A la ligne : ". $e->getLine(). ", du fichier : ". $e->getFile());
            }
        }

        function check($email, $password) {
            $found = false;
            if ($password !== null) {
                $allUsers = $this->getUsers();
                foreach($allUsers as $user) {
                    if ($user["email"] === $email && $user["password"] === $password) {
                        $found = true;
                        break;
                    }
                }  
            }
            else {
                $allUsers = $this->getUsers();
                foreach($allUsers as $user) {
                    if ($user["email"] === $email) {
                        $found = true;
                        break;
                    }
                }
            }
            
            return $found;
        }

        function insert($name, $email, $password, $role): string {
            $check = $this->check($email, null);
            if ($check === false) {
                $stmt = self::$pdo->prepare('insert into user(nom, email, password, role) values(?, ?, ?, ?)');
                $stmt->execute([$name, $email, md5($password), $role]);

                return  "created";

            }
            else {
                return "failed";
            }
        }
}