<?php
    require_once "./modelos/vistasModelo.php";


    class viewController extends vistasModelo{
        
        /*-------------- Controlador Obtener Plantilla --------------*/
        public function get_plantilla_controller(){
            return require_once "./vistas/plantilla.php";
        }

        /*-------------- Controlador Obtener vistas --------------*/
        public function obtener_vistas_controlador(){
			if(isset($_GET['views'])){
				$ruta=explode("/", $_GET['views']);
				$respuesta=vistasModelo::obtener_vistas_modelo($ruta[0]);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}
    }