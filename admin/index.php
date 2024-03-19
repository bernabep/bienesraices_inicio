<?php

//Incluir la conexión
require '../includes/config/database.php';
$bd = conectarDB();

//Escribir el Query
$query = 'SELECT * FROM propiedades';




//Consultar la BD
$resultadoConsulta = mysqli_query($bd, $query);
// echo '<pre>';
// var_dump(mysqli_fetch_all($resultadoConsulta));
// echo '</pre>';


//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

require '../includes/funciones.php';
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
    <tbody><!-- Mostrar los Resultados -->
      <?php
      while ($propiedades = mysqli_fetch_assoc($resultadoConsulta)) : ?>
      
        <tr>
          <td><?php echo $propiedades['id'];?></td>
          <td><?php echo $propiedades['titulo'] ?></td>
          <td><img src="/imagenes/<?php echo $propiedades['imagen'] ?>" alt="" class="imagen-tabla"></td>
          <td>$ <?php echo $propiedades['precio'] ?></td>
          <td>
            <a class="boton-rojo-block" href="#">Eliminar</a>
            <a class="boton-amarillo-block" href="#">Actualizar</a>
          </td>
        </tr>

      <?php endwhile; ?>


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

//Cerrar la conexion
mysqli_close($db);

incluirTemplate('footer');
?>