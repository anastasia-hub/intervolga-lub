<?php
    require_once("server/query.php");
    require_once("server/connect.php");

    session_start();

    $model = isset($_GET['model']) ? $_GET['model'] : $_POST['model'];
    $object_id = isset($_GET['object_id']) ? $_GET['object_id'] : $_POST['id'];

    if (!($_SESSION['user']['id'] == $object_id && $model == 'users') && $_SESSION['user']['status'] != 2)
    {
        header('Location: /');
    }

    $title = "Изменение ".$model;

    if(isset($_POST['update']))
    {
        $model_fields = [
            "users" => ['clients', ['id', 'name', 'lastname', 'birthday', 'num_passport', 'seria_passport', 'status', 'email']],
            "userInsert" => ['clients', ['name', 'lastname', 'birthday', 'num_passport', 'seria_passport', 'status', 'email', 'password']],
            "tours" => ['tour', ['id', 'name', 'price', 'duration', 'amount_tickets', 'busy_tickets', 'descript', 'icon_path', 'city_id']],
            "countrys" => ['country', ['id', 'name', 'priority', 'climate_id']],
            "citys" => ['city', ['id', 'name', 'priority', 'country_id']],
            "climates" => ['climate', ['id', 'name', 'popularity']],
            "receipts" => ['receipt', ['id', 'tour_id', 'user_id']]
        ];

        $fields = [];

        foreach($model_fields[$model][1] as $field)
        {
            if(isset($_POST[$field]) && $_POST[$field])
                $fields[$field] = $_POST[$field];
        }
        
        $a = Update($connect, $model, $_POST, $_FILES);
        //header('Location: /adminpanel.php');
    }
    if(isset($_POST['delete']))
    {   
        $response = DeleteId($connect, $model, $_POST['id']);
        if($response)
        {
            header('Location: /adminpanel.php');
        }    
        else
        {
            $message = "Сначала удалите все записи, которые ссылаются на данный объект";            
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    $object = Select($connect, $model, $where=['id'=> $object_id])[0];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Обновление записи</title>
</head>
<body>

    <?php require_once('modules/header.php') ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="update.php" enctype="multipart/form-data" method="POST" class="form w-50 mr-auto ml-auto">
                        <?php
                            foreach(array_keys($object) as $field)
                            {
                                if($field == "icon_path")
                                {
                                    echo ("
                                        <div class=\"custom-file mt-2 mb-2\">
                                            <input type=\"file\" class=\"custom-file-input\" id=\"icon_path\" name=\"icon_path\">
                                            <label class=\"custom-file-label\" for=\"icon_path\">Изображение профиля</label>
                                        </div>
                                    ");
                                }
                                else
                                {
                                    echo ("
                                        <div class=\"form-group\">
                                            <label for=\"".$field."\">".$field."</label>
                                            <input type=\"text\" class=\"form-control\" id=\"".$field."\" name=\"".$field."\" placeholder=\"".$object[$field]."\">
                                        </div>
                                    ");
                                }
                            }
                        ?>
                        
                        <input type="hidden" name="id" value="<?= $object_id ?>">
                        <input type="hidden" name="model" value="<?=$model?>">
                        <input type="hidden" name="update" value="true">                    
                        <button type="submit" class="btn btn-primary ">Изменить <?= $model ?></button>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <form action="update.php" method="POST" class="form w-50 mr-auto ml-auto">
                        <input type="hidden" name="id" value="<?= $object_id ?>">
                        <input type="hidden" name="model" value="<?=$model?>">
                        <input type="hidden" name="delete" value="true">
                        <button type="submit" class="btn btn-danger ">Удалить объект</button>
                    </form>
                </div>
            </div>    
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
