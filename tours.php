<?php
    session_start();
    require_once("server/connect.php");
    require_once("server/select.php");

    $wheres = [];
    $names = ['count' => null, 'from_city' => 'city_from_id','in_city' => 'city_id','duration' => 'duration', 'price_range' => null, 'sort' => null];

    foreach(array_keys($names) as $where)
    {
        if(isset($_GET[$where]) && $_GET[$where] != "" && $_GET[$where] != 0 && $names[$where] != null)
        {
            $wheres[$names[$where]] = $_GET[$where];
        }
    }
    $tours = Select($connect, 'tours', $wheres);
    
    if(isset($_GET['price_range']))
    {
        switch($_GET['price_range'])
        {
            case 1:
                $tours = array_filter($tours, function($k) {
                    return $k['price'] <= 30000;
                });
                break;
            case 2:
                $tours = array_filter($tours, function($k) {
                    return 30000 <= $k['price'];
                });
                break;
            case 3:
                $tours = array_filter($tours, function($k) {
                    return 50000 <= $k['price'];
                });
                break;
            case 4:
                $tours = array_filter($tours, function($k) {
                    return 70000 <= $k['price'];
                });
                break;
            case 5:
                $tours = array_filter($tours, function($k) {
                    return 100000 <= $k['price'];
                });
                break;
            case 6:
                $tours = array_filter($tours, function($k) {
                    return 150000 <= $k['price'];
                });
                break;
            default:
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Туры</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="tours.php" method="GET" class="mt-5 mb-5 form-filter">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="GroupClient">С кем вы планируете отправиться в путешествие</label>
                                    <select name="count" class="form-control" id="GroupClient">
                                      <option value="0">Выбрать вариант</option>
                                      <option value="1">Один</option>
                                      <option value="2">С друзьями</option>
                                      <option value="3">С семьей</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="FromValue">Откуда вы отправляетесь:</label>
                                    <select name="from_city" class="form-control" id="FromValue">
                                        <option value="0">Выбрать город</option>
                                    <?php
                                        foreach(Select($connect, 'citys') as $city)
                                        {
                                            if(isset($_GET['from_city']) && $_GET['from_city'] == $city['id'])
                                            {
                                                echo ("
                                                    <option selected value=\"".$city['id']."\">".$city['name']."</option>
                                                ");
                                            }
                                            else
                                            {
                                                echo ("
                                                    <option value=\"".$city['id']."\">".$city['name']."</option>
                                                ");
                                            }
                                        }   
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="AmountDays" >На сколько дней вы планируете отпуск</label>
                                    <input name="duration" type="text" class="form-control" id="AmountDays" placeholder="<?=isset($_GET['duration']) ? $_GET['duration'] : 'Свой вариант' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ToValue">Куда хотите отправиться:</label>
                                    <select name="in_city" class="form-control" id="ToValue">
                                        <option value="0">Выбрать город</option>
                                    <?php
                                        foreach(Select($connect, 'citys') as $city)
                                        {
                                            if(isset($_GET['in_city']) && $_GET['in_city'] == $city['id'])
                                            {
                                                echo ("
                                                    <option selected value=\"".$city['id']."\">".$city['name']."</option>
                                                ");
                                            }
                                            else
                                            {
                                                echo ("
                                                    <option value=\"".$city['id']."\">".$city['name']."</option>
                                                ");
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="CostValue">Бюджет:</label>
                                            <select name="price_range" class="form-control" id="CostValue">
                                                <option value="0">Выбрать стоимость</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "1" ? 'selected' : '' ?> value="1">До 30 000 &#8381</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "2" ? 'selected' : '' ?> value="2">От 30 000 &#8381</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "3" ? 'selected' : '' ?> value="3">От 50 000 &#8381</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "4" ? 'selected' : '' ?> value="4">От 70 000 &#8381</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "5" ? 'selected' : '' ?> value="5">От 100 000 &#8381</option>
                                                <option <?=isset($_GET['price_range']) && $_GET['price_range'] == "6" ? 'selected' : '' ?> value="6">От 150 000 &#8381</option>
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
            <h3 class="text-center mb-5">Список подходящих туров:</h3>
            <div class="row">
                <div class="col">
                    <div class="item-list">
                        <?php
                            foreach($tours as $tour)
                            {
                                $city = Select($connect, 'citys', $where=['id'=>$tour['city_id']])[0];
                                $country = Select($connect, 'countrys', $where=['id'=>$city['country_id']])[0];
                                $tour['city'] = $city['name'].", ".$country['name']; 
                                require("modules/tour.php");
                            }
                        ?>
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