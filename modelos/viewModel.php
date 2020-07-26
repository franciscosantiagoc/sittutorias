<?php

    class viewModel{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function getView_model($vistas){
            $blanklist=["home"];
            if(in_array($vistas, $blanklist)){
                if(is_file("./vistas/contenidos/".$vistas."-view.php")){
                    $content="./vistas/contenidos/".$vistas."-view.php";
                }elseif(is_file("./vistas/contenidos/CordCarrera/".$vistas."-view.php")){
                    $content="./vistas/contenidos/CordCarrera/".$vistas."-view.php";
                }elseif(is_file("./vistas/contenidos/VistaAlumnos/".$vistas."-view.php")){
                    $content="./vistas/contenidos/VistaAlumnos/".$vistas."-view.php";
                }elseif(is_file("./vistas/contenidos/VistaRoot/".$vistas."-view.php")){
                    $content="./vistas/contenidos/VistaRoot/".$vistas."-view.php";
                }elseif(is_file("./vistas/contenidos/VistaTutores/".$vistas."-view.php")){
                    $content="./vistas/contenidos/VistaTutores/".$vistas."-view.php";
                }else{
                    $content="404";
                }

            }elseif($vistas=="login"){
                $content="login";
            }elseif($vistas == "index"){
                $content="index";
            }else{
                $content="404";
            }
            return $content;

        }
    }
?>