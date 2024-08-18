<?php
require_once __DIR__. "/constants.php";
class Dbh{
    public function connection(){
        try {
            $connection = new PDO("mysql:host=".HOST.";dbname=".DB."", USER, PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "Error connecting to database " . $e->getMessage();
        }
    }
}

