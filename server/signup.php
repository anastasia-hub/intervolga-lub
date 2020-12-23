<?php

session_start();
require_once 'connect.php';

$name = mysqli_real_escape_string($connect, $_POST['name']);
$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
$num_passport = mysqli_real_escape_string($connect, $_POST['num_passport']);
$seria_passport = mysqli_real_escape_string($connect, $_POST['seria_passport']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$password_confirm = mysqli_real_escape_string($connect, $_POST['password_confirm']);

$check_login = mysqli_query($connect, "SELECT * FROM `clients` WHERE `email` = '$email'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин уже существует",
        "fields" => ['email']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($name === '') {
    $error_fields[] = 'name';
}
if ($lastname === '') {
    $error_fields[] = 'lastname';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}
if ($birthday === '') {
    $error_fields[] = 'birthday';
}
if ($num_passport === '') {
    $error_fields[] = 'num_passport';
}
if ($seria_passport === '') {
    $error_fields[] = 'seria_passport';
}
if ($password === '') {
    $error_fields[] = 'password';
}
if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Введите корректные данные в выделенных полях",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if ($password === $password_confirm) {

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `clients` (`id`, `name`, `lastname`, `email`, `birthday`, `num_passport`, `seria_passport`, `password`) 
                            VALUES (NULL, '$name', '$lastname', '$email', '$birthday', '$num_passport', '$seria_passport', '$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo json_encode($response);
}

?>
