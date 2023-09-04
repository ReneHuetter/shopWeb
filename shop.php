<?php
require 'inc/head.php';
require 'inc/nav.php';
include 'class/produkt.php';
include 'class/cartClass.php';
?>
<h1>Shop</h1>
<div>
    <?php
    $product = new Product();
    $product->loadAllProducts();

    if (isset($_POST['addbtn'])) {
        $cart = new Cart();
        $cart->addtoCart($_POST['productid'], $_SESSION['userid'], $_POST['anzahl']);
    }
    ?>
</div>

<?php
require 'inc/footer.php';
?>