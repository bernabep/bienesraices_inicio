<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';




use App\Propiedad;
$db = conectarDB();
Propiedad::getDB($db);
// $propiedas = new Propiedad;

// var_dump($propiedas);