<?php

namespace App;

class Propiedad
{
    // Base de Datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    //Errores
    protected static $errores=[];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public static function getDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar()
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $query = "INSERT INTO propiedades (";
        $query .= join(", ",array_keys($atributos));
        $query .= ") VALUE('";
        $query .= join("', '",array_values($atributos));
        $query .= "')";

        //Insertar en la base de datos
        $resultado = self::$db->query($query);
        return $resultado;
        
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }



    //Validación
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
    
        if (strlen($this->descripcion) < 5) {
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
    
        if (!$this->habitaciones) {
            self::$errores[] = "El Número de habitaciones es obligatorio";
        }
    
        if (!$this->wc) {
            self::$errores[] = "El Número de baños es obligatorio";
        }
    
        if (!$this->estacionamiento) {
            self::$errores[] = "El Número de Estacionamiento es obligatorio";
        }
    
        if (!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }
    
        if (!$this->imagen) {
            self::$errores[] = "La imagern es Obligatoria";
        }
    
        return self::$errores;
    }
};
