<?php
require 'header.php';
require '../libraries/classes/DB.php';
$db = new DB();
?>

    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            <div>

                <!-- Payment -->
                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                    <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                        <div class="col-span-4">
                            <label for="card-number" class="block text-sm font-medium text-gray-700">Numéro de carte de crédit</label>
                            <div class="mt-1">
                                <input type="number" id="card-number" name="card-number" autocomplete="cc-number" class="block bg-gray-200 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-4">
                            <label for="name-on-card" class="block text-sm font-medium text-gray-700">Nom de la carte</label>
                            <div class="mt-1">
                                <input type="text" id="name-on-card" name="name-on-card" autocomplete="cc-name" class="block bg-gray-200 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="expiration-date" class="block text-sm font-medium text-gray-700">Date d'expiration (MM/YY)</label>
                            <div class="mt-1">
                                <input type="text" name="expiration-date" id="expiration-date" autocomplete="cc-exp" class="block bg-gray-200 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="cvc" class="block text-sm font-medium text-gray-700">CCV</label>
                            <div class="mt-1">
                                <input required type="number" name="cvc" id="cvc" autocomplete="csc" class="block bg-gray-200 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order summary -->
            <div class="mt-10 lg:mt-0">
                <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <dt class="text-base font-medium">
                                Total :
                            </dt>
                            <dd id="total" class="text-base font-medium text-gray-900">

                            </dd>
                            <dd id="total_quantity" class="text-base font-medium text-gray-900">

                            </dd>
                        </div>
                    </dl>

                    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <a href="../templates/orderaction.php" style="text-align: center;" type="submit" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Payer</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const id_total_all = document.getElementById("total");
    id_total_all.innerHTML = window.localStorage.getItem("total_all")+" €";

    let quantity = localStorage.getItem("total_quantity");
    const total = document.getElementById("total_quantity");
    total.innerHTML = `${quantity} article(s)`
</script>
</body>
</html>
