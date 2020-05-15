<?php
require_once "include/common.php";
$msg = '';

if (isset($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<html>

<head>
    <title>Home Page</title>
</head>

<body onload="startTime()">
    <h1><?= $msg ?></h1>
    <h1 align='center'>Welcome to Razer's Banking Services</h1>
    <h2 align='center'> Where would you like to navigate today? </h2>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
    <div id="txt"></div>
    <p align='center'>
        <img src='img/logo.png' width="300" height="300">
    </p>

    <form action='login_process.php' method='POST'>
        <p align='center'>
            Username: <input type='text' name='username'>
            <br>
            Password: <input type='password' name='password'>
            <br><br>
            <input type='submit' name='login' value='Login'> <input type='submit' name='register' value='New User? Register Here'>
        </p>
    </form>
    <hr>

</body>

</html>