<?php
function Insert($connect, $model_name, $fields)
{
    $model_fields = [
        'tour' => ['tour', ['name', 'price', 'duration', 'amount_tickets', 'descript', 'icon_path', 'city_id']],
        'climate' => ['climate', ['name', 'popularity']],
        'country' => ['country', ['name', 'priority', 'climate_id']],
        'city'    => ['city', ['name', 'priority', 'country_id']]
    ];

    $table_name = $model_fields[$model_name][0];

    $select_fields = [];
    foreach($model_fields[$model_name][1] as $field)
    {
        try
        {
            $select_fields[$field] = mysqli_real_escape_string($connect, $fields[$field]);
        }
        catch(Exception $e) 
        {
            echo json_encode(["msg" => "Не найдено поле"]);
            die();
        }
    }
        
    mysqli_query($connect, "INSERT INTO `$table_name` ("
                .join(', ', array_map(function($str) {return "`$str`";}, $model_fields[$model_name][1]))
                .") VALUES ("
                .join(',', array_map(function($str) {return "'$str'";}, $select_fields))
                .")");
}

function Select($connect, $model_name, $where=NULL, $start = 0, $end = PHP_INT_MAX)
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

    $result = [];
    $table_name = $model_fields[$model_name][0];

    $fields = $model_fields[$model_name][1];
    
    if($where != NULL)
    {
        $where_str = [];
        foreach(array_keys($where) as $item)
        {
            array_push($where_str, "`".mysqli_real_escape_string($connect, $item)."` = ".mysqli_real_escape_string($connect, $where[$item]));
        }

        $response = mysqli_query($connect, "SELECT "
            .join(', ', array_map(function($str) {return "`$str`";}, $fields))
            ." FROM `$table_name` WHERE "
            .join(', ', $where_str));
    }
    else
    {
        $response = mysqli_query($connect, "SELECT "
            .join(', ', array_map(function($str) {return "`$str`";}, $fields))
            ." FROM `$table_name` ");
    }

    for($i = 0; ($row = mysqli_fetch_assoc($response)) && $i < $end; $i++)
        if($i >= $start)
            array_push($result, $row);
    
    return $result;
}

function Update($connect, $model_name, $fields=[], $files=[])
{
    $model_fields = [
        "users" => ['clients', ['name', 'lastname', 'birthday', 'num_passport', 'seria_passport', 'status', 'email']],
        "tours" => ['tour', ['name', 'price', 'duration', 'amount_tickets', 'busy_tickets', 'descript', 'icon_path', 'city_id']],
        "countrys" => ['country', ['name', 'priority', 'climate_id']],
        "citys" => ['city', ['name', 'priority', 'country_id']],
        "climates" => ['climate', ['name', 'popularity']],
        "receipts" => ['receipt', ['tour_id', 'user_id']]
    ];

    $table_name = $model_fields[$model_name][0];

    $field_update = [];

    foreach($model_fields[$model_name][1] as $field)
    {
        if(isset($fields[$field]) &&  $fields[$field] != "") 
        {
            $field_update[$field] = mysqli_real_escape_string($connect, $fields[$field]);
        }
        if(isset($files[$field]) && $files[$field]['type'] == 'image/jpeg' && 500000 > $files[$field]['size'] && $files[$field]['size'] > 0 )
        {
            $path = 'uploads/' . time() . mysqli_real_escape_string($connect, $files[$field]['name']);
            move_uploaded_file($files[$field]['tmp_name'], $path);
            $field_update[$field] = $path;
        }
    }
    
    return mysqli_query($connect, "UPDATE `$table_name` SET "
        .join(', ', array_map(function($a, $b) { return "`$a` = '$b'"; }, 
            array_keys($field_update),
            array_values($field_update)))
        ." WHERE `id` = ".mysqli_real_escape_string($connect, $fields['id'])
    );
}

function DeleteId($connect, $model_name, $id=null)
{
    $model_fields = [
        "users" => ['clients', [['receipts', 'user_id']]],
        "tours" => ['tour',  [['receipts', 'tour_id']]],
        "countrys" => ['country', [['citys', 'country_id']]],
        "citys" => ['city', [['tours', 'city_id']]],
        "climates" => ['climate', [['countrys', 'climate_id']]],
        "receipts" => ['receipt', []]
    ];

    $table_name = $model_fields[$model_name][0];

    foreach($model_fields[$model_name][1] as $field)
    {
        $objects = Select($connect, $field[0], $where=[$field[1]=>$id]);
        if($objects != [])
            return false;
    }

    mysqli_query($connect, "DELETE FROM `$table_name` WHERE `id` = ".mysqli_real_escape_string($connect, $id));
}
?>