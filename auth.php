<?php 
include ("blocks/bd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo "Заметки категории - $myrow[title]";?></title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="refresh" content="2;url=index.php" />
</head>
<body>
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div id="text">
		<?php
			if (isset($_POST['enter'])) {
				$e_login = $_POST['e_login'];
				$e_login = stripslashes($e_login);
				$e_login = htmlspecialchars($e_login);
				$e_login = trim($e_login);
				$e_password = $_POST['e_password'];
				$e_password = stripslashes($e_password);
				$e_password = htmlspecialchars($e_password);
				$e_password = trim($e_password);
				$e_password = md5($e_password);
				
				$query = mysql_query("SELECT * FROM users WHERE login = '$e_login'");
				$user_data = mysql_fetch_array($query);
				
				if ($user_data['password'] == $e_password) {
					echo "Welcome to my blog, $e_login!";
					session_start();
					$_SESSION['user'] = $e_login;
					if ($_SESSION['user']=='max') echo "<script>window.open('/admin/index.php', '_self');</script>";
				}
				else {
					echo "Wrong password or login.";
				}
			}
			if (isset($_POST['logout'])) {
				session_start();
				unset($_SESSION['user']);
				session_destroy(); 
				echo "Вы вышли!";
			}
		?>
	</div>
	<?php include ("blocks/sidebar.php"); ?>
</div>
<?php include ("blocks/footer.php");?>
</body>
</html>