<?php 
session_start();
if ($_SESSION['user']!='max') exit("Enter correct login and password firstly. That’s all we know.");
?>