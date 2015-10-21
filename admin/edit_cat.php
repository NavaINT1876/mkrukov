<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Страница редактирования категории</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Отредактируйте категорию</p>
				 <?php 
				if (!isset($id))
				{
					$result=mysql_query("SELECT title,id FROM categories");
					$myrow=mysql_fetch_array ($result);
					do 
						{printf("<p><a href='edit_cat.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);}
					while ($myrow=mysql_fetch_array ($result));
				}
				else 
				{
					$result=mysql_query("SELECT * FROM categories WHERE id=$id");
					$myrow=mysql_fetch_array ($result);
					
					print <<<HERE
						<form action='update_cat.php' method='post' name='form1' id='form1'>
						<p>
						<label for="title">Введите название категории</label>
						:<br>
						<input value="$myrow[title]" type="text" name="title" id="title">
						<br>
						<label for="meta_d">Введите краткое описание категории:<br>
						</label>
						<input value="$myrow[meta_d]"type="text" name="meta_d" id="meta_d">
						<br>
						<label for="meta_k">Введите ключевые слова:<br>
						</label>
						<input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
						<br>
						<label for="text">Введите полный текст категории<br>
						</label>
						<textarea name="text" cols="60" rows="5" id="text">$myrow[text]</textarea>
						<br>
						<input name="id" type="hidden" value="$myrow[id]">
						<br>
						<input type="submit" name="submit" id="submit" value="Сохранить изменения">
						</p>
						</form>
HERE;
				}
				?> 
	</div>						
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->
<!-- footer -->
<?php include ("blocks/footer.php");?>
<!-- end footer -->
</body>
</html>