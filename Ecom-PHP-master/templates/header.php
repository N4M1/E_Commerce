<?php

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StrapLands - <?= $pageTitle="" ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="../templates/img/logo_icon_16x16.png">
    <link href="../templates/style.css" rel="stylesheet" type="text/css">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<div class="bg-white">
    <div id="mobile_menu" class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
        <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
            <div class="px-4 pt-5 pb-2 flex">
                <button type="button" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg id="close" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <img class="h-24 w-full" src="../templates/img/logo.png" alt="">
                </button>
            </div>

            <!-- Links Responsive -->

            <div class="border-t border-gray-200 py-6 px-4 space-y-6">

                <div class="flow-root">
                    <a href="/templates/accueil.php" class="-m-2 p-2 block font-medium text-gray-900">Accueil</a>
                </div>

                <div class="flow-root">
                    <a href="/templates/bracelets.php" class="-m-2 p-2 block font-medium text-gray-900">Nos Bracelets</a>
                </div>

                <div class="flow-root">
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Nos Accessoires</a>
                </div>

                <div class="flow-root">
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">FAQ</a>
                </div>
            </div>

            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Se connecter</a>
                </div>
                <div class="flow-root">
                    <a href="#" class="-m-2 p-2 block font-medium text-gray-900">S'enregistrer</a>
                </div>
            </div>
        </div>
    </div>

    <p class="relative bg-white">
    <p class="bg-blue-500 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
        Livraison offerte à partir de 25€ ! 📦
    </p>

    <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
            <div class="h-16 flex items-center">
                <button type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
                    <span class="sr-only">Open menu</span>
                    <svg id="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="ml-4 flex lg:ml-0">
                    <a href="../templates/accueil.php">
                        <span class="sr-only">Workflow</span>
                        <img class="h-24 w-full" src="../templates/img/logo.png" alt="">
                    </a>
                </div>

                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                    <div class="h-full flex space-x-8">
                        <div class="flex">
                            <div class="relative flex">
                                <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                                    <a href="../templates/accueil.php">
                                        Accueil
                                    </a>
                                </button>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="relative flex">
                                <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px" aria-expanded="false">
                                    <a href="./bracelets.php">
                                        Nos Bracelets
                                    </a>
                                </button>
                            </div>
                        </div>

                        <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Nos Accessoires</a>

                        <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">FAQ</a>
                    </div>
                </div>

                <div class="ml-auto flex items-center">
                    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Se connecter</a>
                        <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">S'enregister</a>
                    </div>
                    <div class="ml-4 flow-root lg:ml-6">
                        <a href="../templates/cart.php" class="group -m-2 p-2 flex items-center">
                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span id="nbr_cart" class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<br>
<script>

    const updateNbrCart = () => {
        const nbr_cart = document.getElementById("nbr_cart");
        let cart = []
        try {
            cart = JSON.parse(window.localStorage.getItem('cart'))
            //console.log(cart);
            if (!Array.isArray(cart)) cart = []

        }catch{
            cart=[];
        }
        nbr_cart.innerHTML = cart.length;
    }
    updateNbrCart();

    const close = () => {
        const mobile_menu = document.getElementById("mobile_menu");
        mobile_menu.style.display = "none";
    }

    const open = () => {
        const mobile_menu = document.getElementById("mobile_menu");
        mobile_menu.style.display = "flex";
    }

    document.getElementById("close").addEventListener("click", close);
    close();

    document.getElementById("open").addEventListener("click", open);

</script>
</body>
</html>

