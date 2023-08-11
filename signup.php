<?php
require 'inc/head.php';
include 'class/userClass.php';
?>

<form action="" method="post" class="formbox" autocomplete="off">
    <h1>signup</h1>
    <input type="text" name="username" placeholder="username" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="password" name="password_confirm" placeholder="password confirm" required>
    <button type="submit" name="signupbtn">signup</button>
</form>