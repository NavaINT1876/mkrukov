<?php 
session_start();
include ("blocks/bd.php");
$result=mysql_query("SELECT title, meta_d, meta_k, text FROM settings WHERE page='contact'",$db);
if (!$result){echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}
if (mysql_num_rows($result)>0) {
$myrow=mysql_fetch_array($result);}
else {echo "<p>Информация по запросу не может быть извелчена. В таблице нет записей.</p>";
exit();
}
?>
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
	<?php echo $myrow["text"];?>
	</div><?php include ("blocks/sidebar.php");?></div><?php include ("blocks/footer.php");?>
</body>
</html>