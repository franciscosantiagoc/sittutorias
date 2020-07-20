<?php
    require_once "./modelos/viewModel.php";


    class viewController extends viewModel{
        
        /*-------------- Controlador Obtener Plantilla --------------*/
        public function get_plantilla_controller(){
            return require_once "./vistas/plantilla.php";
        }

        /*-------------- Controlador Obtener vistas --------------*/
        public function get_vista_controller(){
            if(isset($_GET['views'])){
                $ruta=explode("/",$_GET['views']);
                $response=viewModel::getView_model($ruta[0]);

            }else{
                $response="home";

            }
            return $response;
        }
    }