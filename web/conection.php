<?php
class crud {
    public static function connect() {
        $db = "ires";

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$db", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>