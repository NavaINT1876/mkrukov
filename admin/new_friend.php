<?php include_once("blocked.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Добавление нового сайта друга</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Добавление нового сайта друга</p>
		<form action="add_friend.php" method="post" name="form1" id="form1">
			<p>
				<label for="title">Введите название сайта друга:<br>
					<input type="text" name="title" id="title">
				</label>
			</p>
			<p>
				<label for="meta_d">Введите адрес сайта друга<br>
					<input type="text" name="link" id="link">
				</label>
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="Занести сайт в базу">
			</p>
		</form>						
	</div>						
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->

<!-- footer -->
<?php include ("blocks/footer.php");?>
<!-- end footer -->
</body>
</html>