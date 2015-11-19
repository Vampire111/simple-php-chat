<?php
    session_start();
    session_set_cookie_params(10800);

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
    if (empty($login) or empty($password)) 
	{
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!<br><a href="/login.php">Вернуться на страницу авторизации</a>");
    }
    
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);

    $db = mysqli_connect("mysql.0hosting.me","u179674128_chat","12341234Aa","u179674128_chat") or die("Error " . mysqli_error($db)); 

    $query = "SELECT * FROM user WHERE login='$login'" or die("Error in the consult.." . mysqli_error($db));    
 
    $result = mysqli_query($db, $query);
	
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
        exit ("Извините, введённый вами login не существует<br><a href="/login.php">Вернуться на страницу авторизации</a> ");
    }
    else {
        if ($myrow['password']==$password) {
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['id']=$myrow['id'];

			header( 'Location: /', true, 301 );
        }
         else {
            exit ("Извините, введённый вами login или пароль неверный.<br><a href="/login.php">Вернуться на страницу авторизации</a>");
		}
    }
	
	
    ?>