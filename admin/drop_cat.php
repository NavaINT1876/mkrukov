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
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<?php
		if (isset($id))
		{
			$result0 = mysql_query("SELECT id FROM data WHERE cat = '$id'",$db);
			if (mysql_num_rows($result0) > 0)
				{
					echo "<p>В категории, которую Вы хотите удалить, есть заметки. Сначала перекиньте их по другим категориям</p>";
				}
			else
			{
				$result=mysql_query ("DELETE FROM categories WHERE id='$id'");
				if ($result)
				{
					echo "Ваша категория успешно удалена!";
				}
				else
				{
					echo "Ваша заметка не удалена!!!";
				}
			}
		}
		else 
		{
			echo "<p>Вы запустили данный файл без параметра id и поэтому удалить категорию невозможно.";   
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