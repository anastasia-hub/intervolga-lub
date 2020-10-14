<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container">
            <div class="row mt-5">
                <div class="col-10">
                    <h4>Здравствуйте <?= $_SESSION['user']['name'].' '.$_SESSION['user']['lastname'] ?>!</h4>
                    <h4>Мы помним что у Вас <?= substr($_SESSION['user']['birthday'], 5) ?> день рожения и припосли для Вас подарочек!</h4>
                    <h4>Ваша почта: <?= $_SESSION['user']['email'] ?></h4>
                </div>
                <div class="col-2">
                    <a class="btn btn-danger" href="modules/logout.php" class="logout">Выход</a>
                </div>
            </div>
            <div class="row mt-5">
                <h3>История покупок:</h3>
                <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Откуда</th>
                                <th scope="col">Куда</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Подробнее</th>
                                <th scope="col">Чек</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>@Id</td>
                                <td>@Дата</td>
                                <td>@Откуда</td>
                                <td>@Куда</td>
                                <td>@Статус</td>
                                <td><a href="#">Перейти</a></td>
                                <td><a href="#">Показать</a></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>@Id</td>
                                <td>@Дата</td>
                                <td>@Откуда</td>
                                <td>@Куда</td>
                                <td>@Статус</td>
                                <td><a href="#">Перейти</a></td>
                                <td><a href="#">Показать</a></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>@Id</td>
                                <td>@Дата</td>
                                <td>@Откуда</td>
                                <td>@Куда</td>
                                <td>@Статус</td>
                                <td><a href="#">Перейти</a></td>
                                <td><a href="#">Показать</a></td>
                              </tr>
                            </tbody>
                          </table>
            </div>
        </div>

    </main>

</body>
</html>