<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';




use App\ActiveRecord;
$db = conectarDB();
ActiveRecord::getDB($db);
// $propiedas = new Propiedad;

// var_dump($propiedas);