<?php
require 'header.php';
require '../libraries/classes/DB.php';
$db = new DB();
?>
    <?php
    $products = $db->query('SELECT * FROM product INNER JOIN media ON product.id_product = media.id_media');
    ?>

    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-0">
            <h1 class="text-3xl font-extrabold text-center tracking-tight text-gray-900 sm:text-4xl">Panier</h1>

            <form class="mt-12">
                <div id="container">

                </div>

                <div id="deleteCart">
                    <br>
                    <p style="color:red" class="click_panier"> SUPPRIMER LE PANIER </p>
                </div>

                <div id="id_total_all">
                    <br>

                </div>
    <script>
        let total_price;
        let total_all = 0;
        let total_quantity;

        const fillCart = () => {
            const container = document.getElementById("container");
            let output = "";

            let produits = <?php echo json_encode($products); ?>;
            //console.log(produits);

            let cart = []
            try {
                cart = JSON.parse(window.localStorage.getItem('cart'))
                //console.log(cart);
                if (!Array.isArray(cart)) cart = []

            }catch{
                cart = [];
            }
            for(let i=0; i<produits.length; i++)
            {
                if(cart.includes(produits[i].id_product.toString()))
                {
                    let count = 0
                    for(let j=0; j<cart.length; j++)
                    {
                        if(cart[j] === produits[i].id_product.toString())
                        {
                            count++;
                        }
                    }
                    //console.log(count, produits[i].price)
                    total_quantity = cart.length;
                    window.localStorage.setItem('total_quantity', JSON.stringify(total_quantity));

                    total_price = count * produits[i].price;
                    total_all += total_price;

                    output+=`<section aria-labelledby="cart-heading">
                                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">

                                    <li class="flex py-6">
                                    <div class="flex-shrink-0">
                                        <img src= "${produits[i].source}" alt="" class="w-24 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                    </div>
                                    <div class="ml-4 flex-1 flex flex-col sm:ml-6">
                                    <div>
                                        <div class="flex justify-between">
                                            <h4 class="text-sm">
                                                <a href="../templates/bracelets.php" class="font-medium text-gray-700 hover:text-gray-800">
                                                    x${count} ${produits[i].name}
                                                </a>
                                            </h4>
                                            <p class="ml-4 text-sm font-medium text-gray-900">${total_price} €</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            ${produits[i].price} € / pièce
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Couleur : ${produits[i].color}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Taille : ${produits[i].size}
                                        </p>

                                    </div>
                                    <div class="mt-4 flex-1 flex items-end justify-between">
                                        <p class="flex items-center text-sm text-gray-700 space-x-2">
                                        </p>
                                        <div class="ml-4">
                                            <!-- <button type="button" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                <span>Retirer</span>
                                            </button> -->
                                        </div>
                                    </div>
                                        </div>
                                    </li>
                                </ul>
                            </section> `
                }
            }
            //const q = window.localStorage.getItem("total_quantity");

            container.innerHTML = output;
            window.localStorage.setItem('total_all', JSON.stringify(total_all));
            console.log(window.localStorage.getItem("cart"));
            console.log(window.localStorage.getItem("total_all"));
            const id_total_all = document.getElementById("id_total_all");
            id_total_all.innerHTML = `<p align="center" style="color:black"> Total du panier : ${total_all} € </p>`
        }
        fillCart();

        //Delete Cart
        const deleteCart = document.getElementById("deleteCart");
        deleteCart.addEventListener("click", () => {
            window.localStorage.setItem('cart', "");
            updateNbrCart();
            fillCart();
            deleteCart.remove();
            document.getElementById("id_total_all").remove();

            //[...document.getElementsByClassName("text-sm font-medium text-gray-700 hover:text-gray-800")].map(n => n && n.remove());

            [...document.getElementsByClassName("mt-1 text-sm text-gray-500")].map(n => n && n.remove());
            [...document.getElementsByClassName("mt-10")].map(n => n && n.remove());
            const suppr = document.getElementById("suppr");
            suppr.innerHTML = `<p align="center" style="color:red"> Votre panier est vide :/</p>`
        });

    </script>

                <section aria-labelledby="summary-heading" class="mt-11">
                    <div>
                        <dl class="space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">
                                </dt>

                            </div>
                        </dl>
                        <p class="mt-1 text-sm text-gray-500">
                            Frais de livraison et taxes inclus
                        </p>
                    </div>


                    <div class="mt-10">
                        <a href="../templates/payer.php" style="text-align: center;" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Valider</a>
                    </div>

                    <div id="suppr">

                    </div>

                    <div class="mt-6 text-sm text-center">
                        <p>
                            <a id="continuer" href="../templates/bracelets.php" class="text-indigo-600 font-medium hover:text-indigo-500">continuer le shopping<span aria-hidden="true"> &rarr;</span></a>
                        </p>
                    </div>
                </section>
            </form>
        </div>
    </div>
</body>
</html>
