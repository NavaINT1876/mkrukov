<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Страница редактирования заметки</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
	<p class="post_view_title">Отредактируйте заметку</p>
<?php 
if (!isset($id))
	{
	$result=mysql_query("SELECT title,id FROM data");
	$myrow=mysql_fetch_array ($result);
	do 
		{printf("<p><a href='edit_post.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);}
	while ($myrow=mysql_fetch_array ($result));
	}
else 
	{
	$result=mysql_query("SELECT * FROM data WHERE id=$id");
	$myrow=mysql_fetch_array ($result);
	$result2=mysql_query("SELECT * FROM categories");
	$myrow2=mysql_fetch_array ($result2);
	echo "<form action='update_post.php' method='post' name='form1' id='form1'>
			<p>Выберите категорию для заметки<br/>
			<select name='cat'>";
	do 
	{
		if ($myrow['cat'] == $myrow2['id'])
		{
			printf("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
		}
		else
		{
			printf("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
		}
	}
	while ($myrow2=mysql_fetch_array ($result2));
	echo "</select></p>";
	
	echo "<p>Добавлять в секретный раздел?<br/>
				<label for='secret'><strong>Да</strong><input type='radio'";
		if ($myrow['secret'] == 1) {echo "checked ";} 
		echo "name='secret' id='secret' value='1'></label>
				<label for='nsecret'><strong>Нет</strong>
					<input type='radio'";
		if ($myrow['secret'] == 0) {echo "checked ";} 
		echo "name='secret' id='nsecret' value='0'>
				</label>
			</p>";
	
	print <<<HERE
		<p>
		<label for="title">Введите название заметки</label>
		:<br>
		<input value="$myrow[title]" type="text" name="title" id="title">
		<br>
		<label for="meta_d">Введите краткое описание заметки:<br>
		</label>
		<input value="$myrow[meta_d]"type="text" name="meta_d" id="meta_d">
		<br>
		<label for="meta_k">Введите ключевые слова:<br>
		</label>
		<input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
		<br>
		<label for="date">Введите дату добавления заметки:<br>
		</label>
		<input value="$myrow[date]" name="date" type="text" id="date" value="2014-06-08">
		<br>
		<label for="description">Введите краткое описание заметки<br>
		</label>
		<textarea name="description" cols="60" id="description">$myrow[description]</textarea>
		<br>
		<label for="text">Введите полный текст заметки с тегами<br>
		</label>
		<textarea name="text" cols="60" rows="5" id="text">$myrow[text]</textarea>
		<br>
		<label for="source">Введите источник заметки<br>
		</label>
		<input value="$myrow[source]" type="text" name="source" id="source">
		<br>
		<label for="mini_img">Введите, где лежит миниатюра<br>
		</label>
		<input value="$myrow[mini_img]" type="text" name="mini_img" id="mini_img">
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