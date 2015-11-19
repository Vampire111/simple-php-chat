<?php
session_start();

    if (isset($_POST['message'])) { $message = $_POST['message']; if ($message == '') { header( 'Location: /', true, 301 ); exit();} } 
    if ($_SESSION['login']){
	$datetime = date('Y-m-d h:i:s');
	$login = $_SESSION['login'];

    $db = mysqli_connect("mysql.0hosting.me","u179674128_chat","12341234Aa","u179674128_chat") or die("Error " . mysqli_error($db)); 
	
    $query = "INSERT INTO message (datetime,login,message) VALUES ('$datetime','$login','$message')" . mysqli_error($db);    
 
    $result = mysqli_query($db, $query);
	header( 'Location: /', true, 301 );
	}
	else{
	    echo("Необходимо авторизироваться");
	}
    ?>