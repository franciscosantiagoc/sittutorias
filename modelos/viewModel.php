<?php

    class viewModel{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function getView_model($vistas){
            $blanklist=[];
            if(in_array($vistas, $blanklist)){
                if(is_file("./vistas/contenidos/".$vistas."-view.php")){
                    $content="./vistas/contenidos/".$vistas."-view.php";

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