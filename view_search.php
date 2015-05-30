<?php 
include ("blocks/bd.php");
if (isset($_POST['submit_s'])) {$submit_s=$_POST['submit_s'];}
if (isset($_POST['search'])) {$search=$_POST['search'];}
if (isset($submit_s)){
	if (empty($search) or strlen($search) < 4)
	{
		exit("<p>Поисковый запрос не введен, либо он менее 4-х символов</p>");
	}
	$search = trim($search);
	$search = stripslashes($search);
	$search = htmlspecialchars($search);
	
}
else{
	exit("<p>Вы обратились к файлу без необходимых параметров!</p>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo "Заметки по запросу - $search";?></title>
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
	$result=mysql_query("SELECT id,title,description,date,source,mini_img,view,rating,q_vote FROM data 
	WHERE secret = 0 AND MATCH(text) AGAINST('$search')",$db);
	if (!$result){
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@mkrukov.com.<br> <strong>Код ошибки:</strong></p></div>";
		include ("blocks/sidebar.php");
		echo "</div>";
		exit(mysql_error());
	}
	if (mysql_num_rows($result)>0) {
		$myrow=mysql_fetch_array($result);}
	else {
		echo "<p>Информация по Вашему запросу на блоге не найдена.</p></div>";
		include ("blocks/sidebar.php");
		echo "</div>";
		exit();
	}
	do {
		$r = $myrow['rating']/$myrow['q_vote'];
		$r = intval($r);
		printf("
		<div class='post'>
			<div class='postTitle'>
				<h2>
					<a href='view_post.php?id=%s'>%s</a>
				</h2>
			</div>
			<div class='postInfo'>Автор:&nbsp; %s &nbsp;&nbsp;|&nbsp;&nbsp;Дата добавления:&nbsp; %s  &nbsp;&nbsp;| &nbsp;&nbsp;  рубрика: 
				<a href='#'>&nbsp;WEB-дизайн</a>&nbsp;&nbsp;|&nbsp;&nbsp;Просмотров:&nbsp; %s &nbsp;<img src='img/eye.png'>
			</div>
			<img src='%s'>
			<div class='postContent'>%s</div>
			<div class='post_rating'><p>Рейтинг:&nbsp; <img src='img/%s.gif'/></p></div>
			<div class='postMeta'>
				<span class='postLink'>
					<a href='view_post.php?id=%s'>подробнее</a>
				</span>
				<span class='postComments'>
					<a href='#'>Комментировать</a>
				</span>
			</div>
		</div>						
		",$myrow["id"],$myrow["title"],$myrow["author"],$myrow["date"],$myrow["view"],$myrow["mini_img"],$myrow["description"],$r,$myrow["id"]);
	}
	while ($myrow = mysql_fetch_array($result));
	?></div><?php include ("blocks/sidebar.php");?></div><?php include ("blocks/footer.php");?>
</body>
</html>