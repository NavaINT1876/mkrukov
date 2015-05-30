<?php 
include_once("blocked.php");
include ("blocks/bd.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Main site ADMIN'S block</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Строка подключения хедера и главного меню -->
<?php include ("blocks/headerandmenu.php");?>
<!-- Content BEGIN -->
<div id="content">	
	<div class="text"><br/>
	
	<p>Welcome to main Admin's block!</p></div>
	<?php include ("blocks/sidebar.php");?>
</div>
<!-- Content END -->

<!-- footer -->
<?php include ("blocks/footer.php");?>
<!-- end footer -->
</body>
</html>