<?php
require 'header.php';
require '../libraries/classes/DB.php';
$db = new DB();
?>

<?php
$id_token = session_id();
$upDate = date("Y-m-d");

$bdd = new PDO("mysql:host=localhost;dbname=straplands;charset=utf8", 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->prepare("INSERT INTO paiement (token, updateDate, createdDate) VALUES(?,?,?)");
$req->execute(array($id_token, $upDate, $upDate));


?>
<div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">

        <!-- Order summary -->
        <div class="mt-10 lg:mt-0">
            <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-base font-medium">
                            Merci pour votre achat !
                        </dt>
                        <dd id="total" class="text-base font-medium text-gray-900">

                        </dd>
                    </div>
                </dl>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <a style="text-align: center" href="../templates/accueil.php" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<script>
    window.localStorage.setItem('cart', "");
    window.localStorage.setItem('total_quantity', "");
    updateNbrCart();


</script>

</body>
</html>
