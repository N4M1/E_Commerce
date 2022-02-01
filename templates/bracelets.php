<?php
require 'header.php';
require '../libraries/classes/DB.php';
$db = new DB();
?>

<?php
$products = $db->query('SELECT * FROM product INNER JOIN like_product 
                                                       ON product.id_product = like_product.id_product
                                                       INNER JOIN media 
                                                       ON product.id_product = media.id_media
                                                       ORDER BY like_product.like ASC');
?>

<div align="center">
    <br>
    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                        Nos Bracelets
                    </a>
                </div>
                <div class="flex flex-row ...">
                    <div class="mt-10">
                        <button id="trierNom" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Trier par nom</button>
                    </div>

                    <div class="mt-10">
                        <button id="trierPrix" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Trier par prix</button>
                    </div>

                    <div class="mt-10">
                        <button id="trierColor" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Trier par couleur</button>
                    </div>

                    <div class="mt-10">
                        <button id="trierTaille" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Trier par taille</button>
                    </div>

                    <div class="mt-10">
                        <button id="trierLike" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Trier par likes</button>
                    </div>

                </div>
            </nav>
            <div id="affichage_produits" class="w-full md:w-2/3 xl:w-1/4 p-1 flex flex-wrap">

            </div>
        </div>
    </section>
</div>

<script>
    const addBtnEvent = () =>
    {
        const btn_panier = document.getElementsByClassName("click_panier");

        for (let i = 0; i < btn_panier.length; i++) {
            btn_panier[i].addEventListener("click", () => {
                const id = btn_panier[i].id;

                //console.log(btn_panier[i].id);
                //window.localStorage.setItem("cart", id);
                let cart = []
                try {
                    cart = JSON.parse(window.localStorage.getItem('cart'))
                    console.log(cart);
                    if (!Array.isArray(cart)) cart = []

                } catch {
                    cart = [];
                }
                cart.push(id);
                window.localStorage.setItem('cart', JSON.stringify(cart));
                //Clean tout le cart
                //window.localStorage.setItem('cart', "");
                updateNbrCart();
            });
        }
        //console.log(window.localStorage.getItem("cart"));
    }

        const updateProduit = (type = "name") =>
        {
            console.log(type);
            let affichageProduits = document.getElementById("affichage_produits");
            const produits = <?php echo json_encode($products); ?>;
            affichageProduits.innerHTML = "";

            produits.sort((a, b) => (a.price > b.price) ? 1 : -1)
            if(type === "name") {
                produits.sort((c, d) => (c.name > d.name) ? 1 : -1)
            }else if(type === "color"){
                produits.sort((e, f) => (e.color > f.color) ? 1 : -1)
            }else if(type === "taille"){
                produits.sort((a, b) => (a.size > b.size) ? 1 : -1)
            }else if(type === "like") {
                produits.sort((a, b) => (a.size > b.size) ? 1 : -1)
            }

            let output = "";
            console.log(produits);
            for(let i = 0; i < produits.length; i++)
            {
                output +=
                    `
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg" src= "${produits[i].source}" alt="" class="w-20 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32">
                        <div class="pt-3 flex items-center justify-between">
                            <p id="produit_nom">${produits[i].name}</p>
                            <span>
                                 <img src= "../templates/img/like.png" alt="" >
                                 ${produits[i].like}
                            </span>
                        </div>
                        <div class="pt-3 flex items-center justify-between">
                            ${produits[i].description}
                        </div>
                        <div class="pt-3 flex items-center justify-between">
                            Couleur : ${produits[i].color}
                        </div>
                        <div class="pt-3 flex items-center justify-between">
                            Taille : ${produits[i].size}
                        </div>
                        <br>
                        <span id="${produits[i].id_product}" class="click_panier">
                            <img src= "../templates/img/panier.png" alt="" >
                        </span>
                        <p id="prix_affichage" class="pt-1 text-gray-900">${produits[i].price} €</p>
                    </a>

                  `
            }
            affichageProduits.innerHTML = output;
            addBtnEvent();
        }
        updateProduit()
        document.getElementById("trierNom").addEventListener("click", () => updateProduit("name"));
        document.getElementById("trierPrix").addEventListener("click", () => updateProduit("prix"));
        document.getElementById("trierColor").addEventListener("click", () => updateProduit("color"));
        document.getElementById("trierTaille").addEventListener("click", () => updateProduit("taille"));
        document.getElementById("trierLike").addEventListener("click", () => updateProduit("like"));

</script>
</body>
</html>