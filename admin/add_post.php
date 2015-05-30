<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset ($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset ($_POST['meta_d'])) {$meta_d=$_POST['meta_d'];if ($meta_d=='') {unset($meta_d);}}
if (isset ($_POST['meta_k'])) {$meta_k=$_POST['meta_k'];if ($meta_k=='') {unset($meta_k);}}
if (isset ($_POST['date'])) {$date=$_POST['date'];if ($date=='') {unset($date);}}
if (isset ($_POST['description'])) {$description=$_POST['description'];if ($description=='') {unset($description);}}
if (isset ($_POST['text'])) {$text=$_POST['text'];if ($text=='') {unset($text);}}
if (isset ($_POST['author'])) {$author=$_POST['author'];if ($author=='') {unset($author);}}
if (isset ($_POST['mini_img'])) {$mini_img=$_POST['mini_img'];if ($mini_img=='') {unset($mini_img);}}
if (isset ($_POST['cat'])) {$cat=$_POST['cat'];if ($cat=='') {unset($cat);}}
if (isset ($_POST['secret'])) {$secret=$_POST['secret'];if ($secret=='') {unset($secret);}}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Обработчик</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
	<?php 
	$view=0;
	if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author) && isset($mini_img)&& isset($cat)&& isset($secret))
		{
		$result=mysql_query ("INSERT INTO data (view, title,meta_d,meta_k,date,description,text,source,mini_img,cat,secret) VALUES ('$view','$title', '$meta_d', '$meta_k', '$date', '$description', '$text', '$author', '$mini_img','$cat','$secret')");
		if ($result)
			{echo "Информация в базу добавлена успешно!";}
		else
			{echo "Информация в базу не добавлена:(";}
		}
	else 
		{
		echo "<p>Вы ввели не всю информацию, по-этому заметка не может быть добавлена в базу";   
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