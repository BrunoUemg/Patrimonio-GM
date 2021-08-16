<?php

session_start();

unset($_SESSION['patrimonio']);

header('location:login_gm.php');
?>