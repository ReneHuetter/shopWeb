<div class="nav">
    <div class="textLogo">
        <a href="/codersbay/shop/index.php">Webshop</a>
    </div>
    <div class="mainlinks">
        <a href="/codersbay/shop/shop.php">Shop</a>
        <?php
        if (isset($_SESSION['loggedin'])) { ?>
            <a href="/codersbay/shop/cart.php">Wasrenkorb</a>
        <?php } ?>
    </div>
    <div class="userlinks">
        <?php
        if (isset($_SESSION['loggedin'])) { ?>
            <a href="/codersbay/shop/logout.php"><i class="bx bx-user-circle"></i></a>
        <?php } else { ?>
            <a href="/codersbay/shop/login.php">login</a>
            <a href="/codersbay/shop/signup.php">signup</a>
            <?php } ?>
    </div>
</div>