<?php
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
        if(isset($files[$field]) && $files[$field]['type'] == 'image/jpeg' && 500000 < $files[$field]['size'] && $files[$field]['size'] > 0 )
        {
            $path = 'server/uploads/' . time() . mysqli_real_escape_string($connect, $files[$field]['name']);
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
?>  