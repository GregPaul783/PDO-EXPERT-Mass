<?php 
require "db.php";

class Product {
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
    }

     public function insertProduct($omschrijving, $foto, $prijsperstuk) {
         $this->pdo->run("INSERT INTO product (omschrijving, foto, prijs) VALUES (:omschrijving, :foto, :prijs)",["omschrijving"=>$omschrijving, "foto"=>$foto, "prijs"=>$prijsperstuk]);
     }
}