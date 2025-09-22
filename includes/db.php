<?php

class DB {
    protected $pdo;
    public function __construct($db="winkel", $user="root", $pwd="", $host="localhost") {
    try {
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
    }
    catch(PDOexception $e) {
        die("Connection failed: ") . $e->getMessage();
        }
    }

    public function showProduct() {
    $stmt = $this->pdo->query("SELECT * FROM product");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function run($query, $args = null) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($args);
    return $stmt;
}
}
    ?>