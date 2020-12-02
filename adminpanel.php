<?php
    session_start();
    if (!$_SESSION['user'] or $_SESSION['user']['status'] < 2) {
        header('Location: /');
    }
    require_once("server/connect.php");
    require_once("server/select.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Панель администратора</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>
    
    <main>
        <div class="container">
            <div class="row text-center mt-4">
                <div class="col"><a href="./insert.php?model=tour"><button class="btn btn-primary">Добавить тур</button></a></div>
                <div class="col"><a href="./insert.php?model=city"><button class="btn btn-primary">Добавить город</button></a></div>
                <div class="col"><a href="./insert.php?model=country"><button class="btn btn-primary">Добавить страну</button></a></div>
                <div class="col"><a href="./insert.php?model=climate"><button class="btn btn-primary">Добавить климат</button></a></div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="mt-3 mb-5 form-filter">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="value" placeholder="Введите искомое значение и выберите поле по которому искать" aria-label="Value" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <select class="form-control" id="columnValue">
                                            <option value="1">Id клиента</option>
                                            <option value="2">Id тура</option>
                                            <option value="3">ФИО</option>
                                            <option value="4">Откуда</option>
                                            <option value="5">Куда</option>
                                            <option value="6">Стоимость от</option>
                                            <option value="7">Стоимость до</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Найти</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h3 class="text-center mb-5">Найденные клиенты:</h3>
            <div class="row">
                <div class="col">
                    <div class="client-table">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Статус</th>
                                <th scope="col">email</th>
                                <th scope="col">История поездок</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $iter = 1;
                                foreach(Select($connect, 'users') as $user)
                                {
                                    echo ("
                                      <tr>
                                        <th scope=\"row\">".$iter."</th>
                                        <td>".$user['id']."</td>
                                        <td>".$user['name']."</td>
                                        <td>".$user['lastname']."</td>
                                        <td>".$user['status']."</td>
                                        <td>".$user['email']."</td>
                                        <td><a href=\"#\">Перейти</a></td>
                                      </tr> 
                                    ");

                                    $iter+=1;
                                }
                              ?>
                              
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>