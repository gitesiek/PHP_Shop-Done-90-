<?php
session_start();
$_SESSION['User_Login']=NULL;
$_SESSION['User_ID']=NULL;
header('Location: home.php');
?>