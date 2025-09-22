<?php 
require "db.php";

class User {
    private $pdo;

    public function __construct(){
        $this->pdo = new DB();
    }

    public function registerUser(string $name, string $email, string $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $this->pdo->run("INSERT INTO user (naam, email, password) VALUES (:name, :email, :password)",["name"=>$name, "email"=>$email, "password"=>$hash]);
    }

    public function loginUser(string $email, string $password) {
    $user = $this->pdo->run("SELECT * FROM user WHERE email = :email", ["email" => $email])->fetch();

    if (!$user) {
    throw new Exception("Gebruiker niet gevonden.");
}

if (!password_verify($password, $user['password'])) {
    throw new Exception("Ongeldig wachtwoord.");
}
    }
}