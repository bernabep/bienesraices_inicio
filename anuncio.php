<?php
require 'includes/app.php';


  $db = conectarDB();

  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if (!$id){
    header('Location: index.php');
  }
    

  

  $query = "SELECT * FROM propiedades WHERE id = {$id}";

  $resultado = mysqli_query($db, $query);
  
  if($resultado->num_rows === 0){
    header('Location: index.php');
  }

  $propiedad = mysqli_fetch_assoc($resultado);

  incluirTemplate('header');
  ?>
    <main class="contenedor seccion contenido-centrado">
      <h1><?php echo $propiedad['titulo'];?><h1>
      <picture>
        <img
          class="icono"
          loading="lazy"
          src="imagenes/<?php echo $propiedad['imagen']; ?>"
          alt="imagen destacada"
        />
      </picture>
      <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="icono wc"
            />
            <p><?php echo $propiedad['wc']; ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="icono estacionamiento"
            />
            <p><?php echo $propiedad['estacionamiento']; ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="icono dormitorio"
            />
            <p><?php echo $propiedad['habitaciones']; ?></p>
          </li>
        </ul>
  
        <p class="descripcion-anuncio">
          <?php echo $propiedad['descripcion']; ?>
        </p>
  
      </div>
      <!--.resumen-propiedad-->
    </main>

    <?php 
    mysqli_close($db);
incluirTemplate('footer');

?>
