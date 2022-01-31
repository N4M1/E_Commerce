<?php
require '../libraries/classes/DB.php';
require '../libraries/classes/Cart.php';
$db = new DB();

if(isset($_GET['id']))
{
    $product = $db->queryP('SELECT id_product FROM product WHERE product.id_product=:product.id_product', array('product.id_product' => $_GET['product.id_product']));
    if(empty($product))
    {
        die("Ce produit n'existe pas");
    }
    $_SESSION['cart'][$product[0]->id] = 1;

}else{
    die("Vous n'avez pas selectionne de produit à ajouter au panier");
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StrapLands - Accueil <?= $pageTitle="" ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="/templates/img/logo_icon_16x16.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<h1> WAZA </h1>
</body>
</html>
