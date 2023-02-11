<?php
session_start();
    
    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./admin/controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./admin/modelos/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }


        $ruta = "./admin/vistas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        
    } 
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //Inicio
            if ($_REQUEST['accion'] == "inicio") {
                controladorMusica::mostrarLogin();
            }

            //Login
            if($_REQUEST['accion'] == "login") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);

                controladorMusica::login($email, $password);
            }
            
            if($_REQUEST['accion'] == "mostrarCancion") {
                controladorMusica::texto();
            }


            if($_REQUEST['accion'] == "puntuacionV"){
                $puntuacion = filtrado($_REQUEST["puntuar"]);
                $id = filtrado($_REQUEST["id"]);

                controladorMusica::puntuar($puntuacion, $id);
            }

            if($_REQUEST['accion'] == "toprated"){
                controladorMusica::toprated();
            }
        }
    }





?>