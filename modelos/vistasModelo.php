<?php

    class vistasModelo{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function obtener_vistas_modelo($vistas){
            $listaBlanca=["home","Registro","MenuAlumno","MenuCordArea","MenuCa","MenuRoot","login", "CCActividades","CCAsignTutorado","CCEdit-perfil","CCEstadisticos","CCNotification","CCoordinadores","CCSolicitudes","CCTutorados","CCTutores","CoordinadoresAR","CoordinadoresCR","EstadisticosR"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="login" || $vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;

        }
    }
?>