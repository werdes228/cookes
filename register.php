<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($login === '' || $password === '') {
        die('Введите логин и пароль.');
    }

    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existingLogin) = explode(':', $user);
        if ($existingLogin === $login) {
            die('Пользователь уже существует.');
        }
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents('users.txt', "$login:$hashedPassword\n", FILE_APPEND);

    echo 'Регистрация прошла успешно! <a href="login.html">Войти</a>';
    exit;
}
?>
<form method="post">
    <label>Логин: <input type="text" name="login"></label><br><br>
    <label>Пароль: <input type="password" name="password"></label><br><br>
    <input type="submit" value="Зарегистрироваться">
</form>