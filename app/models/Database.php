<?php


    class Database {
        private $dsn;
        private const server = $_ENV["SERVER"];
        private const dbname = $_ENV["DB_NAME"];
        private const port = $_ENV["PORT"];
        private const user = $_ENV["USER"];
        private const password = $_ENV["PASSWORD"];
        private $pdo;

        function __construct() {
            $this->dsn = "mysql:host=".self::server."; dbname=".self::dbname."; port=".self::port."; charset=utf8";
            
            try {
                $this->pdo = new PDO($this->dsn, self::user, self::password);
                $this->pdo -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
                $this->pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                die("Connexion echouée ". $e->getMessage() .". A la ligne : ". $e->getLine(). ", du fichier : ". $e->getFile());
            }
        }
        
        function returnPDO() {
            return $this->pdo;
        }
    }
