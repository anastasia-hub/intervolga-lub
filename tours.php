<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Туры</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form  class="mt-5 mb-5 form-filter">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="GroupClient">С кем вы планируете отправиться в путешествие</label>
                                    <select class="form-control" id="GroupClient">
                                      <option value="1">Один</option>
                                      <option value="2">С друзьями</option>
                                      <option value="3">С семьей</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="FromValue">Откуда вы отправляетесь:</label>
                                    <select class="form-control" id="FromValue">
                                      <option value="1">Москва</option>
                                      <option value="2">Волгоград</option>
                                      <option value="3">Самара</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="AmountDays" >На сколько дней вы планируете отпуск</label>
                                    <input type="text" class="form-control" id="AmountDays" placeholder="Свой вариант">
                                </div>
                                <div class="form-group">
                                    <label for="ToValue">Куда хотите отправиться:</label>
                                    <select class="form-control" id="ToValue">
                                      <option value="1">Сочи</option>
                                      <option value="2">Турция</option>
                                      <option value="3">Магадан</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="CostValue">Бюджет:</label>
                                            <select class="form-control" id="CostValue">
                                                <option value="1">До 30 000 &#8381</option>
                                                <option value="2">От 30 000 &#8381</option>
                                                <option value="3">От 50 000 &#8381</option>
                                                <option value="4">От 70 000 &#8381</option>
                                                <option value="5">От 100 000 &#8381</option>
                                                <option value="6">От 150 000 &#8381</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Сортировать по:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="RadioSort1" value="Price" checked>
                                                <label class="form-check-label" for="RadioSort1">
                                                    Цене
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="RadioSort2" value="Days">
                                                <label class="form-check-label" for="RadioSort2">
                                                    Кол-ву дней
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="RadioSort3" value="Position">
                                                <label class="form-check-label" for="RadioSort3">
                                                    Месту отпуска
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row float-right">
                                    <div class="col mr-5 ">
                                        <button type="submit" class="btn btn-primary">Найти подходящие туры!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
            <h3 class="text-center mb-5">Список всех туров:</h3>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>