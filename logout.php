<?php
require 'inc/head.php';
require 'inc/nav.php';
include 'class/userClass.php';
?>
<div class="">
    <h1>Logout</h1>
    <form method="post" class="formbox">
        <button type="submit" name="logoutbtn">Logout</button>
    </form>
</div>

<?php
if (isset($_POST['logoutbtn'])) {
    $user = new User();
    $user->logOut();
}
?>
<?php
require 'inc/footer.php';
?>