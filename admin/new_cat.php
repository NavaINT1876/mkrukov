<?php include_once("blocked.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Добавление новой категории</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Добавление новой категории</p>
			<form action="add_cat.php" method="post" name="form1" id="form1">
				<p>
					<label>Введите название категории:<br>
						<input type="text" name="title" id="title">
					</label>
				</p>
				<p>
					<label>Введите краткое описание категории:<br>
						<input type="text" name="meta_d" id="meta_d">
					</label>
				</p>
				<p>
					<label>Введите ключевые слова:<br>
						<input type="text" name="meta_k" id="meta_k">
					</label>
				</p>
				<p>
					<label>Введите полный текст категории с тегами<br>								
						<textarea name="text" cols="50" rows="5" id="text"></textarea>
					</label>
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="Занести категорию в базу">
				</p>
			</form>
	</div>						
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->

<!-- footer -->
<?php include ("blocks/footer.php");?>
</body>
</html>