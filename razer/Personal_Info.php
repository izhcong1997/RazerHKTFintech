<?php
require_once "include/common.php";
require_once "include/protect.php";

$username = $_SESSION['username'];
$msg = $_SESSION['reg'];

?>
<html>
<head>
   <title>Welcome <?=$username?></title>
</head>
<body>
   <p align='center'>
        <img src='img/logo.png' width="300" height="300">
    </p>
   <h2><?=$msg?></h2>
   <form method='POst' action='creation_process.php'>
      Name:<input type = 'text' name = 'name'>
      <br>
      Monthly_income<input type = 'text' name = 'income'>
      <br>
      Monthly_goal<input type = 'text' name = 'goal'>
      <br>
      <input type = 'submit' value = 'submit'>  
   </form>
</body>