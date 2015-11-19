
	<?php
	session_start();
	if ($_SESSION){
	$db = mysqli_connect("mysql.0hosting.me","u179674128_chat","12341234Aa","u179674128_chat") or die("Error " . mysqli_error($db)); 
	#$db = mysqli_connect("localhost","chat_admin","admin","chat") or die("Error " . mysqli_error($db)); 
	$query = "SELECT * FROM message ORDER BY id DESC" or die("Error in the consult.." . mysqli_error($db));    
	$result = mysqli_query($db, $query);
	

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		if ($_SESSION['login'] == $row["login"]){
		printf ("<a href='/delete.php?id=%s'><img src='img/deletered_7070.png' width='14px' height='14px'></a> %s <span style='color:#00a2d3;'>%s</span>: %s<br>", $row['id'], $row["datetime"], $row["login"], $row["message"]);
		}else{
		printf ("%s <span style='color:#00a2d3;'>%s</span>: %s<br>", $row["datetime"], $row["login"], $row["message"]);
		}
	}
	}else{
	echo("Войдите или зарегистрируйтесь)");
	}
	?>
				
			

