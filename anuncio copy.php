<?php
  require 'includes/app.php';

  incluirTemplate('header');
  ?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Casa en Venta frente al bosque</h1>
      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp" />
        <source srcset="build/img/destacada.jpg" type="image/jpeg" />
        <img
          class="icono"
          loading="lazy"
          src="build/img/destacada.jpg"
          alt="imagen destacada"
        />
      </picture>
      <div class="resumen-propiedad">
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="icono wc"
            />
            <p>3</p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="icono estacionamiento"
            />
            <p>3</p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="icono dormitorio"
            />
            <p>4</p>
          </li>
        </ul>
        <p>
          No sólo sobrevivió 500 años, sino que tambien ingresó como texto de
          relleno en documentos electrónicos, quedando esencialmente igual al
          original. Fue popularizado en los 60s con la creación de las hojas
          "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más
          recientemente con software de autoedición, como por ejemplo Aldus
          PageMaker, el cual incluye versiones de Lorem Ipsum.
        </p>
        <p>
          No sólo sobrevivió 500 años, sino que tambien ingresó como texto de
          relleno en documentos electrónicos, quedando esencialmente igual al
          original.
        </p>
      </div>
      <!--.resumen-propiedad-->
    </main>

    <?php 
incluirTemplate('footer');
?>
