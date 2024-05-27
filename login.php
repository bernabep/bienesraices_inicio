<?php
require 'includes/app.php';

$db = conectarDB();
$errores= [];
if($_SERVER['REQUEST_METHOD']=== 'POST'){

    // echo "<pre>";
    // var_dump ($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[]="El email es obligatorio o no es válido";
    }
    if(!$password){
        $errores[]= "El Password es obligatorio";
    }
    if(empty($errores)){
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db,$query);
        

        if($resultado->num_rows){
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            $hash= $usuario['password'];
            $auth = password_verify($password,$hash);
            if($auth){
               //El usuario esta autenticado
               session_start();
               $_SESSION['usuario'] = $usuario['email'];
               $_SESSION['login'] = true;
               header('Location: /admin');




            }else{
                $errores[] = "El password es incorrecto";
            }
            // var_dump($comprobacion);
        } else {
            $errores[] = "El Usuario no existe";
        }

    }
}


incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error):   ?>
        <div class="alerta error">
        <?php echo $error;?>
        </div>
    <?php endforeach;?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" placeholder="Tu Email" />

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Tu password" />

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde" </fieldset>
    </form>
</main>


<?php
incluirTemplate('footer');
?>