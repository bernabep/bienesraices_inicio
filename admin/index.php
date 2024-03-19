<?php
  require '../includes/funciones.php';
  $resultado = $_GET['resultado']??null;
  // echo '<pre>';
  // var_dump($mensaje);
  // echo '</pre>';
  incluirTemplate('header');
  
  ?>

    <main class="contenedor seccion">
    
        <h1>Administrador de Bienes Raices</h1>
        <?php 
        if(intval($resultado)=== 1): ?>
          <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar Propiedad</a>
        <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar Propiedad</a>
        
    </main>

<?php 
incluirTemplate('footer');
?>