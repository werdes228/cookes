<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit;
}
?>
<h1>Профиль пользователя: <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
<a href="logout.php">Выйти</a>