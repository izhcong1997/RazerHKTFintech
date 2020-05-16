<?php
require_once 'include/common.php';
if (isset($_POST['register'])) {
    header('Location: register.php');
    exit;
}
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $dao = new AccountDAO();
        $hash = $dao->getHashedPassword($username);
        $status = password_verify($password, $hash);
        if ($status && $dao->authenticate($username)) {
            $_SESSION['username'] = $username;
            header("location:home.php");
            exit;
        } else {
            $msg = "username and Password does not match";
            $_SESSION['error'] = $msg;
            header("location:index.php");
            exit;
        }
    } else {
        $msg = "Please input your Username and Password";
        $_SESSION['error'] = $msg;
        header("location:index.php");
        exit;
    }
}
