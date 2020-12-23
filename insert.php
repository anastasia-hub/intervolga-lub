<?php
    session_start();
    require_once("server/connect.php");
    require_once("server/insert.php");

    $table_name = isset($_GET['model']) ? $_GET['model'] : $_POST['model'];

    if (!$_SESSION['user'] or $_SESSION['user']['status'] < 2 or !$table_name) {
        header('Location: /');
    }

    $models = [
        'tour' => ['name', 'price', 'duration', 'amount_tickets', 'descript', 'city_id'],
        'climate' => ['name', 'popularity'],
        'country' => ['name', 'priority', 'climate_id'],
        'city'    => ['name', 'priority', 'country_id']
    ];

    if(isset($_POST['insert']))
    {
        $fields = [];
        foreach($models[$table_name] as $field)
        {
            $fields[$field] = $_POST[$field];
        }

        if (Insert($connect, $table_name, $fields))
            header('Location: /adminpanel.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">

    <title>Добавление <?= $table_name ?>. Dream Tour</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>

    <div class="container">
        <div class="row">
            <div class="col">
                
                <form action="insert.php" method="POST" class="form">
                    <input type="hidden" name="model" value="<?= $table_name ?>">
                    <input type="hidden" name="insert" value="true">
                    <?php
                        foreach($models[$table_name] as $field)
                        {
                            echo ("
                                    <div class=\"form-group\">
                                        <label for=\"".$field."\">".$field."</label>
                                        <input type=\"text\" class=\"form-control\" id=\"".$field."\" name=\"".$field."\" placeholder=\"Введите значение\">
                                    </div>
                                ");
                        }
                    ?>
                    
                    <button type="submit" class="btn btn-primary ">Добавить <?= $table_name ?></button>
                </form>
            </div>
        </div>
    </div> 

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>