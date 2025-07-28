<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($login === '' || $password === '') {
        die('Введите логин и пароль.');
    }

    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedLogin, $storedHash) = explode(':', $user);
        if ($login === $storedLogin && password_verify($password, $storedHash)) {
            $_SESSION['user'] = $login;
            header('Location: profile.php');
            exit;
        }
    }

    echo 'Неверный логин или пароль.';
}
?>