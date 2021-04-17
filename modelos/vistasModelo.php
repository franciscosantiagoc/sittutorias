<?php

    class vistasModelo{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function obtener_vistas_modelo($vistas){
			$listaBlanca=["Registro","MenuAlumno","MenuCordArea","MenuCordCa","MenuRoot","MenuTutor", "CCActividades","CCAsignTutorado","Edit-Perfil","CCEstadisticos","CCNotification","CCoordinadores","CCSolicitudes","CCTutorados","CCTutores","CCInfo","CoordinadoresAR","CoordinadoresCR","RootEstadisticosR","RootCoordinadoresAR","RootCoordinadoresCR","AlumnAct","AlumnInfo","AlumnNotif","AlumnSolic","TutorAct","TutorInfo","TutorNotif","TutorTutorados"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="login" || $vistas=="index"){
				$contenido="login";
			}elseif($vistas=="home"){
				$contenido="home";
			}else{
				$contenido="404";
			}
			return $contenido;

        }
    }
?>