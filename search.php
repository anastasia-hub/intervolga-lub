<?php
require_once("server/connect.php");
require_once("server/select.php");

$query = mysqli_real_escape_string($connect, $_GET['query']);

$city_id = Select($connect, 'citys', $where=['name' => $query])[0]['id'];
header("Location: tours.php?in_city=".$city_id);
?>