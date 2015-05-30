<?php 
include ("blocks/bd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo "Регистрация участника";?></title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div id="text">
	<p class="post_view_title">Регистрация нового пользователя</p>
		<form action="reg.php" method="post">
			<p>Введите Ваше имя: <input class="reginput" type="text" name="username" placeholder="  Username" required/></p>
			<p>Введите логин: <input class="reginput" type="text" name="login" placeholder="  Login" required/></p>
			<p>Введите пароль: <input class="reginput" type="password" name="password" placeholder="  Password" required/></p>
			<p>Повторите введенный пароль: <input class="reginput" type="password" name="r_password" placeholder="  Repeat password" required/></p><br/>
			<p>Введите текст из картинки (без пробелов):</p>
			<img style = "border: 1px solid gray; background: url('captcha/bg_capcha.png');" src = "captcha/captcha.php" width="120" height="40"/>
			<input id="captcha" type="text" name="capcha" placeholder="  Текст из картинки" required/>
			<input id="register_button" class="search_b" type="submit" name="submit" value="Зарегистрироваться"/>
		</form>

		<?php 
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$r_password = $_POST['r_password'];
			
			$username = stripslashes($username);
			$username = htmlspecialchars($username);
			$username = trim($username);			
			$login = stripslashes($login);
			$login = htmlspecialchars($login);
			$login = trim($login);
			$password = stripslashes($password);
			$password = htmlspecialchars($password);
			$password = trim($password);
			$r_password = stripslashes($r_password);
			$r_password = htmlspecialchars($r_password);
			$r_password = trim($r_password);

			$samelogins = mysql_query("SELECT id FROM users WHERE login='$login'", $db);
			$thesamelogin = mysql_fetch_array($samelogins);
			
			if (!empty($thesamelogin['id'])) {
				echo "<p class='red'>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.</p>";
			}
			else {
				if ($password == $r_password) {
					$password = md5($password);
					session_start();
					if ($_POST['capcha'] == $_SESSION['capcha']) 
						$new_user = mysql_query("INSERT INTO users (username, login, password) VALUES('$username','$login','$password')") or die(mysql_error());
					else echo "<p class='red'>Текст из картинки введен не верно! Попробуйте другую картинку.</p>";
					if ($new_user) echo "<p class='green'>Поздравляю! Вы зарегистрированы на моем блоге mkrukov.com!</p>";
				}
				else {
					echo "<p class='red'>Пароли должны совпадать!</p>";
				}
			}
		}
		?>
	</div>
	<?php include ("blocks/sidebar.php");?>
</div>
<?php include ("blocks/footer.php");?>
</body>
</html>