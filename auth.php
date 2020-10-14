<?php
    session_start();

    if (isset($_SESSION['user']) and $_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <?php require_once('modules/header.php') ?>

    <form class="form">
        <div class="form-group">
            <label for="login">Почта</label>
            <input type="text" class="form-control" id="login" name="email" placeholder="Введите свой логин">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
        </div>
        
        <button type="submit" class="btn btn-primary login-btn">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
        </p>
        <p class="msg none alert alert-danger"></p>
    </form>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>