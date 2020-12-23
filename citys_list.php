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

    <title>Все города</title>
</head>

<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container mt-5">
            <div class="row">
                    <div class="col">
                        <div class="client-table">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Приоритет</th>
                                    <th scope="col">Id города</th>
                                    <th scope="col">Редактировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $iter = 1;
                                    foreach(Select($connect, 'citys') as $city)
                                    {
                                        echo ("
                                        <tr>
                                            <th scope=\"row\">".$iter."</th>
                                            <td>".$city['id']."</td>
                                            <td>".$city['name']."</td>
                                            <td>".$city['priority']."</td>
                                            <td>".$city['country_id']."</td>
                                            <td><a href=\"/update.php?model=citys&object_id=".$city['id']."\">Перейти</a></td>
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