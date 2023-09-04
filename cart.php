<?php
require 'inc/head.php';
require 'inc/nav.php';
include 'class/cartClass.php';
?>
<div>
    <h1>Warenkorb</h1>
    <div class="shopcontent">
        <?php
        $cart = new Cart();
        $cart->loadCart();

        if (isset($_POST['deletebtn'])) {
            $cart = new Cart();
            $cart->removoCart($_POST['productid']);
        }
        ?>
    </div>
</div>
<?php
require 'inc/footer.php';
?>