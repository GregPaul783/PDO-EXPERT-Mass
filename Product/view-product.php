<?php
Require "./../includes/db.php";

$products = [];

try{
        $DB = new DB();

        $products = $DB->showProduct();
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
<table>
    <tr>
        <td><h3>Product ID |</h3></td>
        <td><h3>Omschrijving |</h3></td>
        <td><h3>Foto |</h3></td>
        <td><h3>Prijs</h3></td>
    </tr>
<?php 
foreach ($products as $row) {
    $imageData = $row["foto"];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($imageData);
?>
    <tr>
        <td><?php echo $row["productID"], ""?></td>
        <td><?php echo $row["omschrijving"]?></td>
        <td><img src="data:<?php echo $mimeType; ?>;base64,<?php echo base64_encode($imageData); ?>" width="100" /></td>
        <td><?php echo $row["prijs"]?></td>
        <td><a href="">Edit</a> | <a href="">Delete</a></td>
    <?php } ?>
    </tr>
</table>
</body>
</html>