<?php
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
        $objects = SelectDb($connect, $field[0], $where=[$field[1]=>$id]);
        if($objects != [])
            return false;
    }

    mysqli_query($connect, "DELETE FROM `$table_name` WHERE `id` = ".mysqli_real_escape_string($connect, $id));
}
?>