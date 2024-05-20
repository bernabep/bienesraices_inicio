<?php
require 'includes/config/database.php';
$db = conectarDB();

$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password,PASSWORD_BCRYPT);
$query = "INSERT IGNORE usuarios (email,password) VALUE ('{$email}','{$passwordHash}')";

echo $query;
mysqli_query($db,$query);
mysqli_close($db);


