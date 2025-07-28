<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

echo "Добро пожаловать в админ панель, " . $_SESSION['user'];
echo '<br><a href="logout.php">Выйти</a>';