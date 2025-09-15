<?php
Require "./../includes/product-class.php";

try{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = new Product();

        $omschrijving = htmlspecialchars($_POST["omschrijving"]);
        $foto = $_POST["foto"];
        $prijsPerStuk = $_POST["prijs"];

        $user->insertProduct($omschrijving, $foto, $prijsPerStuk);
        echo "Toevoegen gelukt!";
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
    <h2>Product Toevoegen</h2>
    <form method="POST">
        <input type="text" name="omschrijving" placeholder="Omschrijving" required> <br>
        <input type="number" name="prijs" placeholder="Prijs per stuk" step=".01" required> <br>
        <input type="file" name="foto" value="Bestand kiezen" required> <br>
        <input type="submit">
    </form>
</body>
</html>