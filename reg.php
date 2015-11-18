<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
    if (empty($login) or empty($password)) 
	{
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

	$db = mysqli_connect("mysql.0hosting.me","u179674128_chat","12341234Aa","u179674128_chat") or die("Error " . mysqli_error($db)); 
	
    $query = "INSERT INTO user (login, password) VALUES ('$login', '$password')" or die("Error in the consult.." . mysqli_error($db));

    $result = mysqli_query($db, $query); 
	include "in_db.php";
?>
