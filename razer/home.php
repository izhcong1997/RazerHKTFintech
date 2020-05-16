<?php

require_once "include/common.php";
require_once "include/protect.php";
$username = $_SESSION['username'];
?>
<html>

<head>
    <title>Home</title>
</head>

<body>
    <h1>Woohooo</h1>
    <form method = 'POST' action = 'deposit.php'>
    How much you want to deposit: <input type='text' name = 'Money'>
    <br>
    <input type='submit' value ='submit'>
    <hr>
    <a href='logout.php'>Logout!</a>
</body>

</html>