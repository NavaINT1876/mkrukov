<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset ($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset ($_POST['meta_d'])) {$meta_d=$_POST['meta_d'];if ($meta_d=='') {unset($meta_d);}}
if (isset ($_POST['meta_k'])) {$meta_k=$_POST['meta_k'];if ($meta_k=='') {unset($meta_k);}}
if (isset ($_POST['text'])) {$text=$_POST['text'];if ($text=='') {unset($text);}}
if (isset($_POST['id'])) {$id=$_POST['id'];}?>
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
		if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
		{
			$result=mysql_query ("UPDATE settings SET title='$title',meta_d='$meta_d',meta_k='$meta_k',text='$text' WHERE id='$id'");
			if ($result)
				{echo "Ваша страница успешно обновлена!";}
			else
				{echo "Ваша страница нихрена не обновлена!!!";}
		}
		else 
		{
			echo "<p>Вы ввели не всю информацию, по-этому урок Ваша страница не может быть обновлена.";   
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