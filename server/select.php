<?php
function Select($connect, $model_name, $where=NULL, $start = 0, $end = PHP_INT_MAX)
{

    $model_fields = [
        "users" => ['clients', ['id', 'name', 'lastname', 'birthday', 'num_passport', 'seria_passport', 'status', 'email']],
        "userInsert" => ['clients', ['name', 'lastname', 'birthday', 'num_passport', 'seria_passport', 'status', 'email', 'password']],
        "tours" => ['tour', ['id', 'name', 'price', 'duration', 'amount_tickets', 'busy_tickets', 'descript', 'city_id']],
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
?>
