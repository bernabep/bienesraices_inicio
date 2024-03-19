<?php
require '../includes/funciones.php';
$resultado = $_GET['resultado'] ?? null;
// echo '<pre>';
// var_dump($mensaje);
// echo '</pre>';
incluirTemplate('header');

?>

<main class="contenedor seccion">

  <h1>Administrador de Bienes Raices</h1>
  <?php
  if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php endif ?>

  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar Propiedad</a>
  <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar Propiedad</a>

  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Casa en la playa</td>
        <td><img src="/imagenes/099a8265be9d8a7b96e0b3454d57bae7.jpg" alt="" class="imagen-tabla"></td>
        <td>$1200000</td>
        <td>
          <a class="boton-rojo-block" href="#">Eliminar</a>
          <a class="boton-amarillo-block" href="#">Actualizar</a>
        </td>
      </tr>
    </tbody>


  </table>



</main>

<?php
incluirTemplate('footer');
?>