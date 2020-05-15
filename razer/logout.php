<?php

require_once 'include/common.php';

session_unset();

session_destroy();

header("location:index.php?reg=Logout Successfully");
exit;
?>