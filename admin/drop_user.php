<?php 
include_once("blocked.php");
include("blocks/bd.php");
if (isset($_POST['id'])) {$id=$_POST['id'];}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Обработчик</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<?php
		if (isset($id))
		{
			$result=mysql_query ("DELETE FROM users WHERE id='$id'");
			if ($result)
				{echo "Пользователь удален!";}
			else
				{echo "Пользователь не удален!!!";}
		}
		else
		{
			echo "<p>Вы запустили данный файл без параметра id и поэтому удалить пользователя невозможно.";   
		}
		?>
	</div>
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->
<?php include ("blocks/footer.php");?>
</body>
</html>