﻿<?php 
include_once("blocked.php");
include("blocks/bd.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Страница удаления категории</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Выберите заметку для удаления</p>
		<form action="drop_cat.php" method="post">	
			<?php 				
			$result=mysql_query("SELECT title,id FROM categories");
			$myrow=mysql_fetch_array ($result);
			do 
				{printf("<p><label><input name='id' type='radio' value='%s'> %s</label></p>",$myrow["id"],$myrow["title"]);}
			while ($myrow=mysql_fetch_array ($result));
			?> 
			<input name="submit" type="submit" value="Удалить категорию!">
	</div>						
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->

<!-- footer -->
<?php include ("blocks/footer.php");?>
<!-- end footer -->
</body>
</html>