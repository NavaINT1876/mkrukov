<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Страница редактирования сайта друга</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Редактирование записи о сайте друга</p>
				<?php 
				if (!isset($id))
				{
					$result=mysql_query("SELECT title,id FROM friends");
					$myrow=mysql_fetch_array ($result);
					do 
						{printf("<p><a href='edit_friend.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);}
					while ($myrow=mysql_fetch_array ($result));
				}
				else 
				{
					$result=mysql_query("SELECT * FROM friends WHERE id=$id");
					$myrow=mysql_fetch_array ($result);
					
					echo "<h2 align='center'>Редактирование сайта друга</h2>";
					
					print <<<HERE
						<form action='update_friend.php' method='post' name='form1' id='form1'>
						<p>
						<label for="title">Введите название сайта друга</label>
						<br>
						<input value="$myrow[title]" type="text" name="title" id="title">
						<br>
						<label for="meta_d">Введите адрес сайта друга:<br>
						</label>
						<input value="$myrow[link]"type="text" name="link" id="link">
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
</body>
</html>