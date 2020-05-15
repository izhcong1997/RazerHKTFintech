<?php
if (!isset($_SESSION['username'])) {
    header("Location: index.php?reg=You dont try to be funny hor, never log in still want play play");
    exit;
}
?>