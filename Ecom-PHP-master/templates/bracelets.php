<?php
require 'header.php';
require '../libraries/classes/DB.php';
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StrapLands - Bracelets <?= $pageTitle="" ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="/templates/img/logo_icon_16x16.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body bgcolor=#d3d3d3>
<div align="center">
    <br>
    <?php $products = $db->query('SELECT * FROM product   
                                                   INNER JOIN like_product 
                                                   ON product.id_product = like_product.id_product
                                                   INNER JOIN media 
                                                   ON product.id_product = media.id_media 
                                                   ORDER BY like_product.like DESC'); ?>
    <?php //var_dump($products); ?>

    <div class="grid grid-cols-4 grid-flow-row gap-2 divide-x">
    <?php foreach ($products as $product): ?>
    <div>
        <a href="#">
            <img src= "<?= $product->source ?>" alt="">
        </a>

        <p id="produit_nom">
            <?= $product->name; ?>
        </p>

        <p id="produit_prix">
            <?= $product->price; ?> €
        </p>

        <p id="produit_description">
            <?= $product->description; ?>
        </p>
        <br>
        <p id="produit_panier">
            <span id="<?= $product->id_product; ?>" class="click_panier">
                <img src= "../templates/img/panier.png" alt="" >
            </span>
        </p>

        <br>
        <p id="produit_like">
            <img src= "../templates/img/like.png" alt="" >
            <?= $product->like; ?>
        </p>
        <br>
        <br>
        <br>
        <br>
    </div>
    <?php endforeach; ?>
        <script>
            const btn_panier = document.getElementsByClassName("click_panier");

            for (let i = 0; i < btn_panier.length; i++)
            {
                    btn_panier[i].addEventListener("click", () => {
                    const id = btn_panier[i].id;

                //console.log(btn_panier[i].id);
                //window.localStorage.setItem("cart", id);
                        let cart = []
                        try {
                            cart = JSON.parse(window.localStorage.getItem('cart'))
                            //console.log(cart);
                            if (!Array.isArray(cart)) cart = []

                        }catch{
                            cart=[];
                        }
                        cart.push(id)
                        window.localStorage.setItem('cart', JSON.stringify(cart));
                    //Clean tout le cart
                    //window.localStorage.setItem('cart', "");
                        updateNbrCart();
                });
            }
            console.log(window.localStorage.getItem("cart"));
        </script>
    </div>
</div>

</body>
</html>