<?php
require_once "include/common.php";
require_once "include/protect.php";

$dao = new AccountDAO();
if (isset($_POST)){
   $Name = $_POST['name'];
   $Income = $_POST['income'];
   $goal = $_POST['goal'];

   $check = $dao->ClientRegister($Name,$Income,$goal);
   if ($check){
      $dao->AutoCreateAccount();
      $_SESSION['Name'] = $Name;
      header("location:home.php");
      exit;
   }  
   else {
      $_SESSION['error'] = 'Error, Please Retry';
      header("location:Personal_info.php");
      exit;
   } 
}
?>