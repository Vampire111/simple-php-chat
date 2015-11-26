<?php
session_start();

	$login = $_SESSION['login'];
	$id = $_GET['id'];

    $db = mysqli_connect("mysql.0hosting.me","u179674128_chat","12341234Aa","u179674128_chat") or die("Error " . mysqli_error($db)); 
	
    $query = "DELETE FROM `message` WHERE id='$id' and login = '$login'" . mysqli_error($db);    
 
    mysqli_query($db, $query);
	header( 'Location: /', true, 301 );
	
?>