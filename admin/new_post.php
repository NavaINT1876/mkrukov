<?php 
include_once("blocked.php");
include ("blocks/bd.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Добавление новой заметки</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Добавление новой заметки</p>
		<form action="add_post.php" method="post" name="form1" id="form1">
			<p>
				<label>Введите название заметки:<br/>
					<input type="text" name="title" id="title">
				</label>
			</p>
			<p>
				<label>Введите краткое описание заметки:<br/>
					<input type="text" name="meta_d" id="meta_d">
				</label>
			</p>
			<p>
				<label>Введите ключевые слова:<br/>
					<input type="text" name="meta_k" id="meta_k">
				</label>
			</p>
			<p>
				<label>Введите дату добавления заметки:<br/>
					<input name="date" type="text" id="date" value="<?php echo date("Y-m-d");?>">
				</label>
			</p>
			<p>
				<label>Введите краткое описание заметки:<br/>
					<textarea name="description" id="description"></textarea>
				</label>
			</p>
			<p>
				<label>Введите полный текст заметки с тегами:<br/>								
					<textarea name="text" id="text"></textarea>
				</label>
			</p>
			<p>
				<label>Введите источник заметки:<br/>
					<input type="text" name="author" id="author">
				</label>
			</p>
			<p>
				<label>Введите, где лежит миниатюра (в формате "files/31_01_2014/kubuntu/kubuntu.jpg)":<br/>
					<input type="text" name="mini_img" id="img">
				</label>
			</p>
			<p>
				<label>Выберите категорию заметки:<br/>
					<select name="cat">
					<?php
						$result=mysql_query("SELECT title,id FROM categories",$db);
						if (!$result)
						{
							echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br/> <strong>Код ошибки:</strong></p>";
							exit(mysql_error());
						}
						 if (mysql_num_rows($result)>0) 
						{
							$myrow=mysql_fetch_array($result);
						}
						else 
						{
							echo "<p>Информация по запросу не может быть извелчена. В таблице нет записей.</p>";
							exit();
						}
						do {
							printf("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
						}
						while ($myrow = mysql_fetch_array($result));
					 
					?>
					</select>
				</label>
			</p>
			<p>Добавлять в секретный раздел?<br/>
				<label><strong>Да</strong>
					<input type="radio" name="secret" id="secret" value="1">
				</label>
				<label><strong>Нет</strong>
					<input checked type="radio" name="secret" id="nsecret" value="0">
				</label>
			</p>
			<p>
			<input type="submit" name="submit" id="submit" value="Занести заметку в базу">
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