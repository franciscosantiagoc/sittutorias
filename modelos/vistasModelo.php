<?php

    class vistasModelo{
        
        /*-------------- Modelo obtener vistas --------------*/
        protected static function obtener_vistas_modelo($vistas){
			$listaBlanca=["Registro","MenuAlumno","MenuCordArea","MenuCordCa","MenuRoot","MenuTutor", "CCActividades","CCAsignTutorado","Edit-Perfil","Estadistics","CCoordinadores","CCSolicitudes"
                ,"CCTutorados","CCTutores","CCInfo","CoordinadoresAR","CoordinadoresCR","RootCoordinadoresAR","RootCoordinadoresCR","AlumnAct","AlumnInfo","AlumnSolic","TutorAct","TutorInfo"
                ,"TutorTutorados","Mensajeria","FormatTutorTutorado","FormatCCTutores","FormatRootCoordinadoresAR","FormatRootCoordinadoresCR","FormatCCordinadores","Notifications","FormatConstancia","CCarreraAct"];
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