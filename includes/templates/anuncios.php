<?php
// Importar la conexión
$db = conectarDB();

//Consulta
$query = "SELECT * FROM propiedades LIMIT $limite";

//Obtener los resultados
$resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">       
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
    <div class="anuncio">
      <picture>
        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />
      </picture>
      
      <div class="contenido-anuncio">
        <h3><?php echo $propiedad['titulo']; ?></h3>
        <p class="descripcion-anuncio"><?php echo $propiedad['descripcion']; ?></p>
        <p class="precio"><?php echo $propiedad['precio']; ?></p>
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
        <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
          Ver propiedad
        </a>
      </div>
      <!--.Contenido-anuncio-->
    </div>
    <!--.Anuncio-->
    <?php endwhile;?>
  </div>  <!--.Contendor-anuncio-->


  <?php
  // Cerrar la conexion
  mysqli_close($db);
  ?>