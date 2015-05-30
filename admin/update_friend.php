<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset ($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset ($_POST['link'])) {$link=$_POST['link'];if ($link=='') {unset($link);}}
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
		 if (isset($title) && isset($link))
		{
			$result=mysql_query ("UPDATE friends SET title='$title',link='$link' WHERE id='$id'");
			if ($result)
				{echo "Сайт обновлен!";}
			else
				{echo "Сайт не обновен!!!";}
		}
		else 
		{
			echo "<p>Вы ввели не всю информацию, по-этому информация не может быть обновлена.";   
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