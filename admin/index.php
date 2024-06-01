<?php

require '../includes/app.php';
estaAutenticado();

use App\Propiedad;

//Implementar un método para obtener todas las propiedades
$propiedades = Propiedad::all();


//Consultar la BD
// $resultadoConsulta = mysqli_query($bd, $query);
// echo '<pre>';
// var_dump(mysqli_fetch_all($resultadoConsulta));
// echo '</pre>';


//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;


if($_SERVER['REQUEST_METHOD']==='POST'){
  $id = $_POST['id'];
  
  $id = filter_var($id,FILTER_VALIDATE_INT);


  if($id){
    $propiedad = Propiedad::find($id);
    $resultado = $propiedad->eliminar();

    if($resultado){
      header('location: /admin?resultado=3');
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
  if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Anuncio Creado Correctamente</p>
  <?php elseif (intval($resultado) === 2) : ?>
    <p class="alerta exito">Anuncio Actualizado Correctamente</p>
  <?php elseif (intval($resultado) === 3) : ?>
    <p class="alerta exito">Anuncio Eliminado Correctamente</p>
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
      <?php foreach($propiedades as $propiedad): ?>

        <tr>
          <td><?php echo $propiedad->id; ?></td>
          <td><?php echo $propiedad->titulo ?></td>
          <td><img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="" class="imagen-tabla"></td>
          <td>$ <?php echo $propiedad->precio ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad->id?>">
              <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>
            <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id ?>">Actualizar</a>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>


  </table>



</main>

<?php


incluirTemplate('footer');
?>