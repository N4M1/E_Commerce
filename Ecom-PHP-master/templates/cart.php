<?php
require '../templates/header.php';
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

<!--Override par le output -->
<div id="container">

</div>

<div id="deleteCart">
    <p> SUPPRIMER PANIER</p>
</div>

<?php
$products = $db->query('SELECT * FROM product   
                                                   INNER JOIN like_product 
                                                   ON product.id_product = like_product.id_product
                                                   INNER JOIN media 
                                                   ON product.id_product = media.id_media 
                                                   ORDER BY like_product.like DESC');
?>

<script>

    const fillCart = () => {
        const container = document.getElementById("container");
        let output = "";

        let produits = <?php echo json_encode($products); ?>;
        console.log(produits);

        let cart = []
        try {
            cart = JSON.parse(window.localStorage.getItem('cart'))
            //console.log(cart);
            if (!Array.isArray(cart)) cart = []

        }catch{
            cart=[];
        }

        for(let i=0; i<produits.length; i++)
        {
            if(cart.includes(produits[i].id_product.toString()))
            {
                console.log("on est dedans");

                let count = 0
                for(let j=0; j<cart.length; j++)
                {
                    if(cart[j] === produits[i].id_product.toString())
                    {
                        count++;
                    }
                }

                console.log(count, produits[i].price)
                const total_price = count * produits[i].price;

                output+=` <p> ID : ${produits[i].id_product}
                          <img src= "${produits[i].source}" alt="" >
                          <p> PRIX : ${total_price} €</p>
                            </p>`
            }
        }
        container.innerHTML = output;
    }
    fillCart();

    //Delete Cart
        const deleteCart = document.getElementById("deleteCart");
        deleteCart.addEventListener("click", () => {
            window.localStorage.setItem('cart', "");
            updateNbrCart();
            fillCart();
        });
</script>

</body>
</html>
