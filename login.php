<?php
require 'inc/head.php';
require 'inc/nav.php';
include 'class/userClass.php';
?>

<form action="" method="post">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="username" required>
    <input type="password" name="pw" placeholder="Password" required>
    <button type="submit" name="loginbtn">Login</button>
</form>

<?php
if (isset($_POST['loginbtn'])) {
    $user = new User();
    $user->login($_POST['username'], sha1($_POST['pw']));
}
?>

<?php
require 'inc/footer.php'
?>