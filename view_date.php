<?php 
session_start();
include ("blocks/bd.php");
if (isset($_GET['date']))
{
	$date=$_GET['date'];
}
else
{
	exit("<p>Вы обратились к файлу без необходимы параметров. Проверьте адресную строку браузера.</p>");
}
$date_title = $date;
$date_begin = $date;
$date++;
$date_end = $date;
$date_begin = $date_begin."-01";
$date_end = $date_end."-01";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo "Заметки за $date_title";?></title>
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
	WHERE secret = 0 AND date>='$date_begin' AND date<'$date_end'",$db);
	if (!$result){
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@mkrukov.com.<br> <strong>Код ошибки:</strong></p>";
		exit(mysql_error());
	}
	if (mysql_num_rows($result)>0) {
		$myrow=mysql_fetch_array($result);}
	else {
		echo "<p>Информация по запросу не может быть извелчена. В таблице нет записей.</p>";
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
			<div class='postInfo'>Источник:&nbsp; %s<br/>Дата добавления:&nbsp; %s  &nbsp;&nbsp;| &nbsp;&nbsp;  рубрика: 
				<a href='#'>&nbsp;Linux</a>&nbsp;&nbsp;|&nbsp;&nbsp;Просмотров:&nbsp; %s &nbsp;<img src='img/eye.png'>
			</div>
			<img src='%s'>
			<div class='postContent'>%s</div>
			<div class='post_rating'><p>Рейтинг:&nbsp; <img src='img/%s.gif'/></p></div>
			<div class='postMeta'>
				<span class='postLink'>
					<a href='view_post.php?id=%s'>подробнее</a>
				</span>
				<span class='postComments'>
					<a href='view_post.php?id=%s#com'>Комментировать</a>
				</span>
			</div>
		</div>						
		",$myrow["id"],$myrow["title"],$myrow["source"],$myrow["date"],$myrow["view"],$myrow["mini_img"],$myrow["description"],$r,$myrow["id"],$myrow["id"]);
	}
	while ($myrow = mysql_fetch_array($result));
	?>
	</div><?php session_start(); include ("blocks/sidebar.php");?>
</div>
<?php include ("blocks/footer.php");?>
</body>
</html>