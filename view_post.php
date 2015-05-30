<?php 
session_start();
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (!isset($id)){$id=1;}
if (!preg_match("|^[\d]+$|",$id)) {
exit("<p>Неверный формат запроса! Проверьте URL!</p>");
}
$result=mysql_query("SELECT * FROM data WHERE id='$id'",$db);
if (!$result)
{
	echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@mkrukov.com.<br/> <strong>Код ошибки:</strong></p>";
	exit(mysql_error());
}
if (mysql_num_rows($result)>0) 
{
	$myrow=mysql_fetch_array($result);
	$new_view = $myrow["view"]+1;
	$update = mysql_query("UPDATE data SET view='$new_view' WHERE id='$id'",$db);
}
else 
{
	echo "<p>Информация по запросу не может быть извелчена. В таблице нет записей.</p>";
	exit();
}?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $myrow["title"];?></title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">
	<div id="text">
		<?php 
			printf("<h1 class='post_view_title'>%s</h1><p class='post_add2'>Источник: %s</p><p class='post_add2'>Дата: %s</p>%s<p class='post_view'>Просмотров: %s</p>",$myrow["title"],$myrow["source"],$myrow["date"],$myrow["text"],$myrow["view"]);
			?>
			<form action="vote_res.php" method="post" name="vv">
			<p class="pvote">Оцените заметку: 
				1 <input name="score" type="radio" value="1"/>
				2 <input name="score" type="radio" value="2"/>
				3 <input name="score" type="radio" value="3"/>
				4 <input name="score" type="radio" value="4"/>
				5 <input name="score" type="radio" value="5" checked/>
				<input class="sub_vote" name="submit" type="submit" value="Оценить"/>
				<input name="id" type="hidden" value="<?php echo "$id";?>"/>
			</p>
			
			</form>
			<?php
			echo "<p class='post_comment' id='com'>Комментарии к этой заметке:</p>";
			$result3 = mysql_query("SELECT * FROM comments WHERE post='$id'",$db);
			if (mysql_num_rows($result3)>0)
			{
				$myrow3 = mysql_fetch_array($result3);
				do {
					printf("<div class='post_div'><p class='post_comment_add'>Комментарий добавил(а): <b>%s</b><br/>Дата: <b>%s</b></p>
					<p>%s</p></div>", $myrow3["author"],$myrow3["date"],$myrow3["text"]);
				}
				while($myrow3 = mysql_fetch_array($result3));
			}
			$result4 = mysql_query("SELECT img FROM comments_setting",$db);
			$myrow4 = mysql_fetch_array($result4);
		
				if (isset($_SESSION['user'])) {
					$user_name = $_SESSION['user'];
					echo "
						<p class='post_comment'>Комментарий от $user_name:</p>
						<form action='comment.php' method='post' name='form_com'>
							<p><label>Текст комментария:<br/><textarea name='text' cols='72' rows='5'></textarea></label></p>
							<input name='author' type='hidden' value='$user_name'>
							<input name='id' type='hidden' value='$id'>
							<p><input class='sub_vote' name='sub_com' type='submit' value='Комментировать'></p>
						</form>
					";
				}
				else {
					echo "<p id='unregistered'>Комментарии могут оставлять только зарегистрированные пользователи.<br/> 
					<span><a href='#'>Войдите</a> или <a href='reg.php'>зарегистрируйтесь.</a></span></p>";
				}
				?>
		
	</div>
	<?php include ("blocks/sidebar.php");?>
</div>
<?php include ("blocks/footer.php");?>
</body>
</html>