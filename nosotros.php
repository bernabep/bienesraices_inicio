<?php
  require 'includes/funciones.php';

  incluirTemplate('header');
  ?>
    <main class="contenedor seccion">
      <h1>Conoce Sobre Nosotros</h1>
      <div class="nosotros">
        <picture class="imagen-nosotros">
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              width="200"
              height="300"
              src="build/img/nosotros.jpg"
              alt="imagen sobre nosotros"
            />
          
        </picture>
        <div class="texto-nosotros">
          <blockquote>25 Años de Experiencia</blockquote>
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
      </div>
    </main>

    <section class="contenedor seccion">
      <h1>Más Sobre Nosotros</h1>

      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Fue popularizado en los 60s con la creación de las hojas "Letraset",
            las cuales contenian pasajes de Lorem Ipsum, y más recientemente con
            software de autoedición, como por ejemplo Aldus PageMaker, el cual
            incluye versiones de Lorem Ipsum.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono2.svg" alt="Icono Precios" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Fue popularizado en los 60s con la creación de las hojas "Letraset",
            las cuales contenian pasajes de Lorem Ipsum, y más recientemente con
            software de autoedición, como por ejemplo Aldus PageMaker, el cual
            incluye versiones de Lorem Ipsum.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
          <h3>Tiempo</h3>
          <p>
            Fue popularizado en los 60s con la creación de las hojas "Letraset",
            las cuales contenian pasajes de Lorem Ipsum, y más recientemente con
            software de autoedición, como por ejemplo Aldus PageMaker, el cual
            incluye versiones de Lorem Ipsum.
          </p>
        </div>
      </div>
    </section>

    <?php 
incluirTemplate('footer');
?>