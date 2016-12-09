<?php
session_start();
if( !isset($_SESSION['login'])|| $_SESSION['login']!="logged"){
	header('location:index.php');
	die();
}

?>