<?php

require '../includes/app.php';
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

//Implementar un método para obtener todas las propiedades
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();


//Consultar la BD
// $resultadoConsulta = mysqli_query($bd, $query);
// echo '<pre>';
// var_dump(mysqli_fetch_all($resultadoConsulta));
// echo '</pre>';


//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  $tipo = $_POST['tipo'];

  if (validarTipoContenido($tipo)) {
    if ($tipo === "vendedor") {
      $vendedor = Vendedor::find($id);
      $vendedor = $vendedor->eliminar();
    } elseif ($tipo === 'propiedad') {
      $propiedad = Propiedad::find($id);
      $resultado = $propiedad->eliminar();
    }
  }
}

// echo '<pre>';
// var_dump($mensaje);
// echo '</pre>';
incluirTemplate('header');

?>

<main class="contenedor seccion">

  <h1>Administrador de Bienes Raices</h1>
  <?php
  $mensaje = mostrarNotificacion(intval($resultado));
  if ($mensaje) { ?>
    <p class="alerta exito"><?php echo s($mensaje) ?></p>
  <?php } ?>



  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo(a) Vendedor</a>
  <!-- <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar Propiedad</a>
  <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar Propiedad</a> -->
  <h2>Propiedades</h2>
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
      <?php foreach ($propiedades as $propiedad) : ?>

        <tr>
          <td><?php echo $propiedad->id; ?></td>
          <td><?php echo $propiedad->titulo ?></td>
          <td><img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="" class="imagen-tabla"></td>
          <td>$ <?php echo $propiedad->precio ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>
            <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id ?>">Actualizar</a>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Vendedores</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody><!-- Mostrar los Resultados -->
      <?php foreach ($vendedores as $vendedor) : ?>

        <tr>
          <td><?php echo $vendedor->id; ?></td>
          <td><?php echo $vendedor->nombre . " " .  $vendedor->apellido ?></td>
          <td><?php echo $vendedor->telefono ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>
            <a class="boton-amarillo-block" href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id ?>">Actualizar</a>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>



</main>

<?php


incluirTemplate('footer');
?>