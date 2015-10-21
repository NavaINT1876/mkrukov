<?php include_once("blocked.php");?>
<div id="sidebar">
	<div class="nav_title">Авторизация</div>
	<div class="sidebar_section">
		<?php
				session_start();
				if (isset($_SESSION['user'])) {
					$user_name = $_SESSION['user'];
					echo "<p>You've already logged in, $user_name!</p>
					<form  action='../auth.php' method='post'>
						<input class='search_b' type='submit' name='logout' value='logout'/><br/>
					</form>
					";
				}
		?>	
	</div>
	<div class="nav_title">Заметки</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='new_post.php'><img src='img/plus.png'/><span>Добавить заметку</span></a></p>
		<p class='point'><a class='nav_link' href='edit_post.php'><img src='img/edit.png'/><span>Редактировать заметку</span></a></p>
		<p class='point'><a class='nav_link' href='del_post.php'><img src='img/delete.png'/><span>Удалить заметку</span></a></p>
	</div>
	
	<div class="nav_title">Категории</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='new_cat.php'><img src='img/plus.png'/><span>Добавить категорию</span></a></p>
		<p class='point'><a class='nav_link' href='edit_cat.php'><img src='img/edit.png'/><span>Редактировать категорию</span></a></p>
		<p class='point'><a class='nav_link' href='del_cat.php'><img src='img/delete.png'/><span>Удалить категорию</span></a></p>
	</div>

	<div class="nav_title">Друзья</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='new_friend.php'><img src='img/plus.png'/><span>Добавить сайт</span></a></p>
		<p class='point'><a class='nav_link' href='edit_friend.php'><img src='img/edit.png'/><span>Редактировать сайт</span></a></p>
		<p class='point'><a class='nav_link' href='del_friend.php'><img src='img/delete.png'/><span>Удалить сайт</span></a></p>
	</div>
	
	<div class="nav_title">Тексты</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='edit_text.php'><img src='img/edit.png'/><span>Редактировать</span></a></p>
	</div>	
	<div class="nav_title">Полезное</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='index.php'><img src='img/arr.jpg'/><span>Главная страница Админа</span></a></p>
	</div>
	<div class="nav_title">Пользователи</div>
	<div class="sidebar_section">
		<p class='point'><a class='nav_link' href='show_users.php'><img src='img/arr.jpg'/><span>Пользователи</span></a></p>
		<p class='point'><a class='nav_link' href='del_user.php'><img src='img/delete.png'/><span>Удалить пользователя</span></a></p>
	</div>	
</div>