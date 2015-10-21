<div style="float:right; width:24%; margin-right:10px; margin-top:5px;">
	<div class="nav_title">Авторизация</div>
	<div class="sidebar_section">
		<?php
				session_start();
				if (isset($_SESSION['user'])) {
					$user_name = $_SESSION['user'];
					echo "<p>You've already logged in, $user_name!</p>
					<form  action='../auth.php' method='post'>
						<input class='search_b' type='submit' name='logout' value='Выход'/><br/>
					</form>
					";
				}
				else {
					echo "<form class = 'auth' action='../auth.php' method='post'>
						<input type='text' name='e_login' placeholder='  Login' required/><br/>
						<input type='password' name='e_password' placeholder='  Username' required/><br/>
						<input class='search_b' type='submit' name='enter' value='Enter'/><br/>
					</form>
					<p>Вы еще не зарегистрированы? - <a href='reg.php'>Регистрация</a></p>";
				}
		?>
	</div>	
	<div class="nav_title">Категории</div>
	<div class="sidebar_section">
	<?php 
		$result2=mysql_query("SELECT * FROM categories",$db);
		if (!$result2)
		{
			echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br> <strong>Код ошибки:</strong></p>";
			exit(mysql_error());
		}
		if (mysql_num_rows($result2)>0) 
		{
			$myrow2=mysql_fetch_array($result2);
			do 
			{
				printf("<p class='point'><img src='img/arr.jpg'><a class='nav_link' href='view_cat.php?cat=%s'>%s</a></p>",$myrow2["id"],$myrow2["title"]);
			}
			while ($myrow2 = mysql_fetch_array($result2));
		}
		else 
		{
			echo "<p>Информация по запросу не может быть извелчена. В таблице нет записей.</p>";
			exit();
		}
	?>
	</div>
	<div class="nav_title">Последние заметки:</div>
	<div class="sidebar_section">
	<?php
		$result3 = mysql_query("SELECT id, title FROM data WHERE secret = 0 ORDER BY id DESC LIMIT 5",$db);
		$myrow3 = mysql_fetch_array($result3);
		if (!$result3)
		{
			echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br> <strong>Код ошибки:</strong></p>";
			exit(mysql_error());
		}
		do 
		{
			printf("<p class='point'><img src='img/arr2.jpg'><a class='nav_link' href='view_post.php?id=%s'>%s</a></p>",$myrow3["id"],$myrow3["title"]);
		}
		while ($myrow3 = mysql_fetch_array($result3));
	?>
	</div>
	<div class="nav_title">Архив</div>
	<div class="sidebar_section">
	<?php
		$result4 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC",$db);
		$myrow4 = mysql_fetch_array($result4);
		if (!$result4)
		{
			echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br> <strong>Код ошибки:</strong></p>";
			exit(mysql_error());
		}
		do 
		{
			printf("<p class='point'><img src='img/arr3.jpg'><a class='nav_link' href='view_date.php?date=%s'>%s</a></p>",$myrow4["month"],$myrow4["month"]);
		}
		while ($myrow4 = mysql_fetch_array($result4));
	?>
	</div>
	<div class="nav_title">Полезное:</div>
	<div class="sidebar_section">
	<?php
	$result5 = mysql_query("SELECT title, link FROM friends",$db);
	$myrow5 = mysql_fetch_array($result5);
	if (!$result5)
	{
		echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com.<br> <strong>Код ошибки:</strong></p>";
		exit(mysql_error());
	}
	do 
	{
		printf("<p class='point'><img src='img/arr4.jpg'><a class='nav_link' href='%s' target='_blank'>%s</a></p>",$myrow5["link"],$myrow5["title"]);
	}
	while ($myrow5 = mysql_fetch_array($result5));
	?>
	</div>
	<div class="nav_title">Поиск</div>
	<div class="sidebar_section">
		<form action="view_search.php" method="post" name="form_s">
			<p class="search_t">Поисковый запрос должен быть не менее 4-х символов.</p>
			<p>
				<input name="search" type="text" size="20" maxlength="40">
				<br/>
				<input class="search_b" name="submit_s" type="submit" value="Искать">
			</p>
		</form>
	</div>
	<div class="nav_title">Статистика</div>
	<?php
	$result10 = mysql_query("SELECT COUNT(*) FROM data", $db);
	$sum = mysql_fetch_array($result10);
	
	$result11 = mysql_query("SELECT COUNT(*) FROM comments", $db);
	$sum2 = mysql_fetch_array($result11);
	echo "<p class = 'comments'>Заметок в базе: $sum[0]<br> Комментариев: $sum2[0]</p>";
	?>
</div>