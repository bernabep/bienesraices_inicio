<?php
//Base de datos
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;



estaAutenticado();

$db = conectarDB();
$propiedad = new Propiedad;

//Consultar vendedores
$query = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $query);

//Arreglo con mensajes de errores
$errores = Propiedad::getErrores();




//Ejecutar el código después de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);



    //**Subida de archivos*//
    //Generar un nombre único a la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
    //Setear la imagen
    //Realiza un resize a la imagen con intervention
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }


    //Validar
    $errores = $propiedad->validar();


    // //Asignar files hacia una variable
    // $imagen = $_FILES['imagen'];


    //Revisar que el array de errores este vacio

    if (empty($errores)) {
                
                
        //Guardar en la base de datos
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        $resultado = $propiedad->guardar();

        // // echo $query;
        // if ($resultado) {

        //     // echo "Insertado Correctamente";
        //     //Se redirecciona al usuario en lugar de pasar un mensaje Ok
        //     header("Location: /admin?resultado=1");
        // }
    }
}


incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php';?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>