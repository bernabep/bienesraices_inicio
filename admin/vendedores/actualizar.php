<?php
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

// Validar id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

$vendedor = Vendedor::find($id);


//Arreglo con mensajes de errores
$errores = Vendedor::getErrores();
// debuguear($_SERVER["REQUEST_METHOD"]);
//Ejecutar el código después de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //Asignar los atributos
    $args = $_POST['vendedor'];
    

    $vendedor->sincronizar($args);
    
    



    //Validar
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $resultado = $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <!-- <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data"> -->
    <form class="formulario" method="POST">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>