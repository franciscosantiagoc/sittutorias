<?php

    class vistasModelo{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function obtener_vistas_modelo($vistas){
<<<<<<< HEAD
            $listaBlanca=["home","Registro","MenuAlumno","MenuCordArea","MenuCordCa","MenuRoot","MenuTutor","login", "CCActividades","CCAsignTutorado","CCEdit-perfil","CCEstadisticos","CCNotification","CCoordinadores","CCSolicitudes","CCTutorados","CCTutores","CoordinadoresAR","CoordinadoresCR","RootEstadisticosR","RootCoordinadoresAR","RootCoordinadoresCR"];
=======
            $listaBlanca=["home","Registro","MenuAlumno","MenuCordArea","MenuCa","MenuRoot","login", "CCActividades","CCAsignTutorado","CCEdit-perfil","CCEstadisticos","CCNotification","CCoordinadores","CCSolicitudes","CCTutorados","CCTutores","CoordinadoresAR","CoordinadoresCR","EstadisticosR","AlumnAct","AlumnEditPerfil","AlumnInfo","AlumnNotif","AlumnSolic","TutorAct","TutorEditPerfil","TutorInfo","TutorNotif","TutorTutorados"];
>>>>>>> 15104936ff13ee6a2a494ef2c4e30bb85fd0493c
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