<?php
require_once __DIR__ . '/dbClass.php';

class User extends Database
{
    public function login($username, $password)
    {
        $stmt = $this->conn()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $result = $stmt->fetchAll();

        if ($stmt->rowCount() == 1)
        {
            $_SESSION['loggedin'] = 1;
            $_SESSION['userid'] = $result['id'];
            echo 'User login successful';
            header("Refresh:3;url=index.php");
            return true;
        }
        else
        {
            return false;
        }
    }

    public function signup($username, $password, $email)
    {
        if (!$this->isUsernameAvailable($username))
        {
            echo 'Username not available';
            return false;
        }
        if (!$this->isEmailAvailable($email)) 
        {
            echo 'Email not available';
            return false;
        }
        $stmt = $this->conn()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
        echo 'User successfully signed up';
        header("Refresh:3;url=index.php");
        return;
    }

    private function isUsernameAvailable($username) 
    {
        $stmt = $this->conn()->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function isEmailAvailable($email)
    {
        $stmt = $this->conn()->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logOut()
    {
        unset($_SESSION['loggedin']);
        unset($_SESSION['userid']);
        echo "Logged out successfully";
        header("Refresh:3;url=index.php");
    }
}
?>