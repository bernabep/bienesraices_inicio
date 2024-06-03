<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
estaAutenticado();

// Validar id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}

//Consultar propiedad
$propiedad = Propiedad::find($id);
// debuguear($propiedad);

//Consultar vendedores
$vendedores = Vendedor::all();

//Arreglo con mensajes de errores
$errores = Propiedad::getErrores();




//Ejecutar el código después de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  //Asignar los atributos
  $args = $_POST['propiedad'];

  $propiedad->sincronizar($args);

  //Validación
  $errores = $propiedad->validar();

  //Generar un nombre único a la imagen
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

  //Subida de archivos

  if ($_FILES['propiedad']['tmp_name']['imagen']) {

    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
    $propiedad->setImagen($nombreImagen);
  }
  //Validación
  $errores = $propiedad->validar();

  //Revisar que el array de errores este vacio
  if (empty($errores)) {
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
      //Almacenar la imagen
      $image->save(CARPETA_IMAGENES . $nombreImagen);
    }
    $propiedad->guardar();
  }
  // echo $query;
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Actualizar Propiedad</h1>

  <a href="/admin" class="boton boton-verde">Volver</a>


  <?php foreach ($errores as $error) :  ?>

    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <form class="formulario" method="POST" enctype="multipart/form-data">
    <?php include '../../includes/templates/formulario_propiedades.php' ?>
    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>