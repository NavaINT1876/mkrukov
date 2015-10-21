<?php 
include_once("blocked.php");
include("blocks/bd.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Страница удаления пользователя</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text">
		<p class="post_view_title">Выберите пользователя для удаления</p>
			<form action="drop_user.php" method="post">	
				<?php				
				$result=mysql_query("SELECT id,login FROM users");
				$myrow=mysql_fetch_array ($result);
				do
					{printf("<p><label><input name='id' type='radio' value='%s'> %s</label></p>",$myrow["id"],$myrow["login"]);}
				while ($myrow=mysql_fetch_array ($result));
				?> 
				<input name="submit" type="submit" value="Удалить пользователя!">
			</form>
	</div>						
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->
<?php include ("blocks/footer.php");?>
</body>
</html>