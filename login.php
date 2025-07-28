<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $corlogin = 'admin';
    $corpassword = '1234';

    if ($login === $corlogin && $password === $corpassword) {
        $_SESSION['user'] = $login;
        header("Location: profile.php");
        exit;
    } else {
        $error = "Неверный логин или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
</head>
<body>

<?php if (!empty($error)) echo "<p>$error</p>"; ?>

<form action="login.php" method="post">
  <label>Логин: <input type="text" name="login"></label><br><br>
  <label>Пароль: <input type="password" name="password"></label><br><br>
  <input type="submit" value="Войти">
</form>

</body>
</html>
