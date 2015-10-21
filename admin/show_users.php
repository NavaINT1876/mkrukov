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
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
	<p class="post_view_title">Список пользователей</p>
<?php
//Выводим список пользователей, если не выбран ни один из них
if (!isset($id)) {
	$result=mysql_query("SELECT login,id FROM users");
	$myrow=mysql_fetch_array ($result);
	do 
		{printf("<p><a href='show_users.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["login"]);}
	while ($myrow=mysql_fetch_array ($result));
}
//Если существует id пользователя, показываем все его комментарии



else {
//Выбираем логин пользователя для его идентификации в заголовке
	$myrow = mysql_fetch_array(mysql_query("SELECT login FROM users WHERE id=$id"));
	$user = $myrow["login"];
//Выводим заголовок с идентификацией пользователя
	echo "<h2 align='center'>Все комментарии пользователя $user</h2>";
//Выбираем данные по комментарию
	$chose_user = mysql_query("SELECT post,text,date FROM comments WHERE author='$user'");
	$theuser = mysql_fetch_array ($chose_user);	
//Выбираем название категории		
	
	do {
		$postnumber = $theuser["post"];		
		$cc = mysql_query("SELECT title FROM data WHERE id=$postnumber",$db);
		$thepost = mysql_fetch_array($cc);
		$post = $thepost["title"];
		if (!$post) $post="Заметка была перемещена в другую категорию или удалена.";


			printf("<div class='post_div'><p class='post_comment_add'>Тема статьи: <b>%s</b><br/>Дата: <b>%s</b></p>
		<p>%s</p></div>",$post,$theuser["date"],$theuser["text"]);
	}
	while($theuser = mysql_fetch_array($chose_user));
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