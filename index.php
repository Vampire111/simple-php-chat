<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>  
<title>Чат! Добро пожаловать!</title>

</head>
<body>
    <div class="main">
        <div class="links">
		    <?php 
			if ($_SESSION){
		        echo("<a href='/logout.php'>Выйти</a> Ваш логин: "); echo($_SESSION['login']);
		    }
			else{
			    echo("<a href='/registration.php'>Регистрация</a> <a href='/login.php'>Войти</a>");
			}
			?>
		</div>
		
		<div class="chat">
			<div class="enter">
			    <form method="post" action="sendmessage.php" class="send">
				    <p>
                    <label for="login">Сообщение:</label>
                    <input autofocus autocomplete="off" type="text" name="message" id="message" value="">
					<button type="submit" class="send-button">Отправить</button>
                    </p>
				</form>
			</div>
			<hr>
			<div id="show" >
			
			<script>  
				function show()  
				{  
					$.ajax({  
						url: "showchat.php",  
						cache: false,  
						success: function(html){  
							$("#show").html(html);  
						}  
					});  
				}  
			  
				$(document).ready(function(){  
					show();  
					setInterval('show()',3000);  
				});  
            </script>  
			</div>
			
			
		</div>
		
    </div>
</body>

</html>
