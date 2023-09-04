<?php
require 'inc/head.php';
require 'inc/nav.php';
include 'class/';
include 'class/';
?>
<h1>Shop</h1>
<div>
    <?php
    $product = new Product();
    $product->loadAllProducts();

    if (isset($_POST['addbtn'])) {
        $cart = new Cart();
        $cart->addtoCart();
    }
    ?>
</div>

<?php
require 'inc/footer.php';
?>