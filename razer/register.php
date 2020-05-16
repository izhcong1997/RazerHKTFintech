<?php
function passChk($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $count = $uppercase + $lowercase + $number + $specialChars;
    if($count == 4){
        return true;
    }
    return false;
}
require_once "include/common.php";
$msg = '';
if( isset($_POST['username']) && isset($_POST['password']) 
&& !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    if(passChk($password) && strlen($password) >= 8 && $r_password == $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $msg = "Successfully Registered! <br> Please input your personal information before we proceed with the account creation";
        $dao = new AccountDAO();
        $dao->register($username,$hashed_password);
        $_SESSION['reg'] = $msg;
        $_SESSION['username'] = $username;
        header("location:Personal_info.php");
        exit;
    } else if($r_password != $password){
        $msg = "Passwords does not match";
    } else {
        $msg = "Password must include at least 1 Special Character, 1 Number, 1 Lower case and 1 uppercase and at least 8 characters long";
    }
} else {
    $msg = "Please input your Username and Password";
}
?>

<html>
<head>
    <title>Registration</title>
</head>
<body>

<h1>Registration</h1>
<h2><?=$msg?></h2>
    <form method='POST'>
        Username: <input type='text' name='username'>
        <br>
        Password: <input type='password' name='password'>
        <br>
        Re-Type Password: <input type='password' name='r_password'>
        <br><br>
        <input type='submit' value='Register'>
    </form>
<hr>
<a href='index.php'>Back</a>
</body>
</html>