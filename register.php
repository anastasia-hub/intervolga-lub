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
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>

    <?php require_once('modules/header.php') ?>

    <div class="container">
        <div class="row">
            <div class="col">
                
                <form class="form">

                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="email" class="form-control" id="name" name="name" placeholder="Введите свое имя">
                    </div>

                    
                    <div class="form-group">
                        <label for="lastname">Фамилия</label>
                        <input type="email" class="form-control" id="lastname" name="lastname" placeholder="Введите свою фамилию">
                    </div>

                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Дата рождения</label>
                        <input class="form-control" type="date" id="birthday" name="birthday" placeholder="Введите дату рождения">
                    </div>
                    
                    <div class="form-group">
                        <label for="num_passport">Номер паспорта</label>
                        <input class="form-control" type="number" id="num_passport" name="num_passport" placeholder="Введите номер паспорта">
                    </div>

                    <div class="form-group">
                        <label for="seria_passport">Серия паспорта</label>
                        <input class="form-control" type="number" id="seria_passport" name="seria_passport" placeholder="Введите серию паспорта">
                    </div>

                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Подтверждение пароля</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                    <button type="submit" class="btn btn-primary register-btn">Зарегистрироваться</button>
                    <p>
                        У вас уже есть аккаунт? - <a href="auth.php">авторизируйтесь</a>!
                    </p>
                    <p class="msg none alert alert-danger"></p>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>