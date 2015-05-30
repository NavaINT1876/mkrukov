<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset ($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset ($_POST['meta_d'])) {$meta_d=$_POST['meta_d'];if ($meta_d=='') {unset($meta_d);}}
if (isset ($_POST['meta_k'])) {$meta_k=$_POST['meta_k'];if ($meta_k=='') {unset($meta_k);}}
if (isset ($_POST['text'])) {$text=$_POST['text'];if ($text=='') {unset($text);}}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
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
	if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
	{
		$result=mysql_query ("INSERT INTO categories (title,meta_d,meta_k,text) VALUES ('$title', '$meta_d', '$meta_k', '$text')");
		if ($result)
			{echo "Информация в базу добавлена успешно!";}
		else
			{echo "Информация в базу не добавлена:(";}
	}
	else 
	{
	echo "<p>Вы ввели не всю информацию, по-этому категория не может быть добавлена в базу";   
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