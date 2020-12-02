<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
    require_once("server/connect.php");
    require_once("server/select.php");
    
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
                    <a class="btn btn-danger" href="server/logout.php" class="logout">Выход</a>
                </div>
            </div>
            <div class="row mt-5">
                <h3>История покупок:</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Id</th>
                      <th scope="col">Название</th>
                      <th scope="col">Куда</th>
                      <th scope="col">Стоимость</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $iter = 1;
                      foreach(Select($connect, 'receipts', $where=['user_id'=>$_SESSION['user']['id']]) as $receipt)
                      {
                          $tour = Select($connect, 'tours', $where=['id'=>$receipt['tour_id']])[0];
                          $city = Select($connect, 'citys', $where=['id'=>$tour['city_id']])[0];
                          $country = Select($connect, 'countrys', $where=['id'=>$city['country_id']])[0];
                          
                          $tour['city'] = $city['name'].", ".$country['name']; 

                          echo ("
                            <tr>
                              <th scope=\"row\">".$iter."</th>
                              <td>".$tour['id']."</td>
                              <td>".$tour['name']."</td>
                              <td>".$tour['city']."</td>
                              <td>".$tour['price']."</td>
                            </tr>
                          ");

                          $iter+=1;
                      }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>