<?php

function Insert($connect, $model_name, $fields)
{
    $model_fields = [
        'tour' => ['tour', ['name', 'price', 'duration', 'amount_tickets', 'descript', 'city_id']],
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
?>