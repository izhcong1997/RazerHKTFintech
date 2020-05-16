<?php 
require_once "include/common.php";
require_once "include/protect.php";

$dao = new accountDAO;

$money = $_POST['Money'];

$dao->Deposit($money);

header("location:home.php");
exit;
?>