<?php 
include("blocks/bd.php");

if (isset($_POST['author'])){$author = $_POST['author'];}
if (isset($_POST['text'])){$text = $_POST['text'];}
if (isset($_POST['sub_com'])){$sub_com = $_POST['sub_com'];}
if (isset($_POST['id'])){$id = $_POST['id'];}

if (isset($sub_com))
{
	if (isset($text)){trim($text);}
	else {$text="";}
	if (empty($text))
	{
		exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля. <br>
		<input name='back' type='button' value='Вернуться назад' onclick='history.back();'>");
	}
	$text = stripslashes($text);
	$text = htmlspecialchars($text);
	
	$result = mysql_query("SELECT sum FROM comments_setting",$db);
	$myrow = mysql_fetch_array($result);
	
		$date = date("Y-m-d");		
		$result2 = mysql_query("INSERT INTO comments (post, author, text, date) VALUES ('$id', '$author', '$text', '$date')",$db);
		$result3 = mysql_query("SELECT title FROM data WHERE id='$id'",$db);
		$myrow3 = mysql_fetch_array($result3);
		
		$post_title = $myrow3["title"];
		/* $message = 'Появился комментарий к заметке - '.$post_title.'\n 
		Комментарий добавил (а): '.$author.'\n Текст комментария: '.$text.' \n 
		Ссылка на заметку: http://blog/view_post.php?id='.$id; */
		//ini_set("SMTP", "localhost");
		//ini_set("smtp_port", "15025");
		//$to = "igor.kucherenko@mail.ru";
		//$subject = "New comment on blog";
		//$message = "Hello, world!";
		//$email = mail("igor.kucherenko@mail.ru","New comment came","Available neeeeeeew commentariy","Content-type:text/plain;Charset=utf-8\r\n");
		//$email = mail($to,$subject,$message);
		$email = mail('kutscherenko.igor@gmail.com', 'My Subject', 'My message');

		if($email) {echo "<html><head><meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'/></head></html>"; 
		exit();}
		else {echo 'что-то не так';}
	}
?>