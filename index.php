<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">

    <title>Dream Tour</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container">
            <div  class="row mt-5 mb-5">
                <h3>Актуальные горячие туры</h3>
            </div>
            <div class="row">
                <div class="col">
                    <div class="item-list">
                        <div class="item">
                            <div class="row">
                                <div class="col-6">
                                    <img class="item-list_img" src="img/1.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Название страны</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Стоимость: (N) &#8381</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Длительность тура: (M) ночей</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5 float-right">
                                        <div class="col mr-5 ">
                                            <a href="#" class="btn btn-outline-success"><h4>Заказать</h4></a>
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-6">
                                    <img class="item-list_img" src="img/2.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Название страны</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Стоимость: (N) &#8381</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Длительность тура: (M) ночей</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5 float-right">
                                        <div class="col mr-5 ">
                                            <a href="#" class="btn btn-outline-success"><h4>Заказать</h4></a>
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-6">
                                    <img class="item-list_img" src="img/3.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Название страны</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Стоимость: (N) &#8381</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <h4>Длительность тура: (M) ночей</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-5 float-right">
                                        <div class="col mr-5 ">
                                            <a href="#" class="btn btn-outline-success"><h4>Заказать</h4></a>
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>