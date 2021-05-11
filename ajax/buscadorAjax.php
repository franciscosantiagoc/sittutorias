
<?php

session_start(['name'=>'STI']);
require_once "../config/APP.php";

if(isset($_POST['busqueda_inicial']) || isset($_POST['eliminar_busqueda'])  ){  // Si viene definido el valor
    // Código que funcionará para todos los buscadores
    $data_url=[   // las vistas donde se va a redireccionar
        "CCTutora2"=>"CCTutorados",
        "CCTutor"=>"CCTutores",
        "CoordinadoresRoot"=>"RootCoordinadoresCR",
        "JefesDeptRoot"=>"RootCoordinadoresAR"


    ];
    // url , las vistas, vista donde se está enviando el valor

    //Comprobar el valor que estamos enviando, sea solamente de lo que nosotros estamos definiendo
    if (isset($_POST['modulo'])){
         $modulo=$_POST['modulo'];
         if (!isset($data_url[$modulo])){  // Si da falso, va a ser verdadero
             $alerta = [
                 "Alerta" => "simple",
                 "Titulo" => "Ocurrio un error inesperado",
                 "Texto" => "No podemos continuar con la búsqueda debido a un error",
                 "Tipo" => "error"
             ];
             echo json_encode($alerta);
             exit();
         }

    }else{
        $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "No podemos continuar con la búsqueda, debido a un error de configuración",
            "Tipo" => "error"
        ];
        echo json_encode($alerta);
        exit();

    }

    /*Implementado, ejemplo de búsqueda de un módulo que tiene 2 campos
    if($modulo=="prestamo"){

        $fecha_inicio="fecha_inicio_".$modulo;
        $fecha_final="fecha_final_".$modulo;

        //iniciar busqueda
        if(isset($_POST['fecha_inicio_']) || isset($_POST['fecha_inicio_'])){
            if ($_POST['fecha_inicio_']=="" || $_POST['fecha_final']==""){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "Por favor introduce una fecha de inicio y una fecha final",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
            $_SESSION[$fecha_inicio]=$_POST['fecha_inicio_'];
            $_SESSION[$fecha_final]=$_POST['fecha_final'];

        }

        //eliminar busqueda
        if (isset($_POST['eliminar_busqueda'])){
            unset($_SESSION[$fecha_inicio]);
            unset($_SESSION[$fecha_final]);

        }

    }else{ // TRABAJANDO CON OTROS MÓDULOS
        // mismo código del de abajo pero sin el de eliminar
        $name_var="busqueda_".$modulo;

        // iniciar búsqueda
        if (isset($_POST['busqueda_inicial'])){
            if ($_POST['busqueda_inicial'] == ""){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "Por favor introduce un término de búsqueda para empezar",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
            $_SESSION[$name_var]=$_POST['busqueda_inicial'];
        }



    }*/
        //original
        $name_var="busqueda_".$modulo;  // ejemplo búsqueda_usuario o busqueda_cliente

        // iniciar búsqueda
        if (isset($_POST['busqueda_inicial'])){
            if ($_POST['busqueda_inicial'] == ""){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrio un error inesperado",
                    "Texto" => "Por favor introduce un término de búsqueda para empezar",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit();
            }
            $_SESSION[$name_var]=$_POST['busqueda_inicial'];
        }

        // eliminar busqueda
        if (isset($_POST['eliminar_busqueda'])){
            unset($_SESSION[$name_var]);
        }


    $url=$data_url[$modulo];
    // redireccionar
    $alerta=[
        "Alerta"=>"redireccionar",
        "URL"=>SERVERURL.$url."/"
    ];
    echo json_encode($alerta);


}else{
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}