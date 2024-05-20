<?php

require '../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth){
  header('Location: /');
}


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


if($_SERVER['REQUEST_METHOD']==='POST'){
  $id = $_POST['id'];
  $id = filter_var($id,FILTER_VALIDATE_INT);


  if($id){

    //Elimino el archivo
    $query = "SELECT imagen FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($bd,$query);
    $propiedad = mysqli_fetch_assoc($resultado);
    unlink('../imagenes/'.$propiedad['imagen']);

    //Elimino la propiedad
    $query = "DELETE FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($bd,$query);


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
      <?php
      while ($propiedades = mysqli_fetch_assoc($resultadoConsulta)) : ?>

        <tr>
          <td><?php echo $propiedades['id']; ?></td>
          <td><?php echo $propiedades['titulo'] ?></td>
          <td><img src="/imagenes/<?php echo $propiedades['imagen'] ?>" alt="" class="imagen-tabla"></td>
          <td>$ <?php echo $propiedades['precio'] ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedades['id']?>">
              <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>
            <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedades['id'] ?>">Actualizar</a>
          </td>
        </tr>

      <?php endwhile; ?>
    </tbody>


  </table>



</main>

<?php

//Cerrar la conexion
mysqli_close($bd);

incluirTemplate('footer');
?>