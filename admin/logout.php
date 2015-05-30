<?php include_once("blocked.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="refresh" content="1;url=../index.php" />
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div id="text">
		<?php
			if (isset($_POST['logout'])) {
				echo "Вы будете перенаправлены на главную страницу";
				unset($_SESSION['user']);
				unset($_SESSION['check']);
				session_destroy(); 
				
			}		
		?>
		</div><?php include ("blocks/sidebar.php");?></div><?php include ("blocks/footer.php");?>
</body>
</html>