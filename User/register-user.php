<?php
Require "./../includes/user-class.php";

try{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = new User();

        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        $user->registeruser($name, $email, $password);
        echo "Registratie gelukt!";
        session_start();
        header("refresh:2, url = ../index.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Account aanmaken</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required> <br>
        <input type="email" name="email" placeholder="Email" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <input type="submit">
    </form>
</body>
</html>