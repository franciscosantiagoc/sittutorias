<?php
if ($peticionAjax) {
    require_once "../modelos/solicitudModel.php";

} else {
    require_once "./modelos/solicitudModel.php";


}

class solicitudesController extends solicitudModel
{
    public function registro_solicitud_controlador()
    {
        $nctrl = mainModel::limpiar_cadena($_POST['snctrl']);
        $select_solicitud = mainModel::limpiar_cadena($_POST['Mselect_solictud']);
        $cambio_tutor = mainModel::limpiar_cadena($_POST['Cambio_Tutor']);
        $solicitud= "";

        if($this->valida_liberacion()){
            $select_solicitud = 6;
        }

        if($select_solicitud == 1){
            $solicitud = "Solicitar cambio de Tutor";

        }elseif($select_solicitud == 2){
            $solicitud = "Solicitar constancia";

        }elseif($select_solicitud == 3){
            $solicitud = "Solicitar revisión de actividad";

        }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El tipo de solicitud no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'AlumnSolic"
                  }
               });
            </script>
            ';
            exit();
        }

        if($select_solicitud == 1 && $cambio_tutor == ""){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No has seleccionado un tutor",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'AlumnSolic"
                  }
               });
            </script>
            ';
            exit();
        }elseif($select_solicitud != 1){
            $cambio_tutor = null;
        }

        $check_nctrl=mainModel::ejecutar_consulta_simple("SELECT NControl  FROM tutorado Where NControl=$nctrl");
        if($check_nctrl->rowCount()==0){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al cargar los datos del alumno",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'AlumnSolic"
                  }
               });
            </script>';
            exit();
        }

        $check_matricula=mainModel::ejecutar_consulta_simple("SELECT Matricula  FROM trabajador Where Matricula=$cambio_tutor");
        if($check_matricula->rowCount() == 0 && $select_solicitud == 1){
            echo '
                <script> 
                   Swal.fire({
                      title: "Ocurrio un error inesperado",
                      text: "Error al cargar los datos del docente",
                      type: "error",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                      if(result.value){
                         window.location="'.SERVERURL.'AlumnSolic"
                      }
                   });
                </script>';
            exit();
        }

        //$consulta=" INSERT  INTO (idSolicitud,Tutorado_NControl, tipo_solicitud, Trabajador_Matriculanuevo, fecha_solicitud, estado) VALUES (CONCAT($nctrl,DATE_FORMAT(NOW(),'%d%m%Y%I%i%s')), $nctrl,$solicitud,$cambio_tutor,CURDATE(),0) ";
        $datos_solic = [
            "ncontrol"=>$nctrl,
            "tsolicitud"=>$solicitud,
            "matricula"=>$cambio_tutor
        ];
        $consulta = solicitudModel::agregar_solicitud_modelo($datos_solic);
        //echo $consulta;
        if($consulta->rowCount() == 0){
            echo '
                <script>
                   Swal.fire({
                      title: "Ocurrio un error inesperado",
                      text: "Error al enviar la solicitud",
                      type: "error",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                      if(result.value){
                         window.location="'.SERVERURL.'AlumnSolic"
                      }
                   });
                </script>
            ';
            exit();

        }else{
            echo '
                <script>
                   Swal.fire({
                      title: "Solicitud enviada",
                      text: "Se ha enviado correctamente su solicitud",
                      type: "success",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                      if(result.value){
                         window.location="'.SERVERURL.'AlumnSolic"
                      }
                   });
                </script>
            ';
            exit();
        }
    }

    /* == controlador actualizar trabajador */
    public function consulta_solicitudes_controlador()
    {
        $matricula = mainModel::limpiar_cadena($_SESSION['matricula_sti']);
        $consulta="SELECT  s.idSolicitud,t.NControl,p.Nombre,p.APaterno,p.AMaterno, s.tipo_solicitud, s.fecha_solicitud, s.estado, c.Areas_idAreas 
            FROM trabajador tr ,solicitudes s 
            INNER JOIN tutorado t ON  t.NControl = s.Tutorado_NControl INNER JOIN persona p ON p.idPersona = t.Persona_idPersona 
            INNER JOIN carrera c ON c.idCarrera = t.Carrera_idCarrera WHERE tr.Matricula = $matricula AND c.Areas_idAreas = tr.Areas_idAreas ORDER BY s.estado ASC, s.fecha_solicitud ASC ";
        $consulta_solicitudes = mainModel::ejecutar_consulta_simple($consulta);
        $dat_info = $consulta_solicitudes -> fetchAll();
        return $dat_info;


    }
    // AlumnSolic
    public function consulta_solicitudtutorado_controlador(){
        $ncontrol = $_SESSION['NControl_sti'];
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM solicitudes WHERE Tutorado_NControl=$ncontrol");
        $consulta = $consulta->fetchAll();
        return $consulta;
     }

    // CCSolicitudes modal
    public function solicitudes_tutorado_controlador(){
        $noctrl = mainModel::limpiar_cadena($_POST['solic_tutorado']);
        $idsolicitud = mainModel::limpiar_cadena($_POST['id_solicitud']);
        if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
            $alerta = [
                "Response" => "error",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }




        $busqueda_tutorado = usuarioModel::ejecutar_consulta_simple("SELECT p.Nombre, p.APaterno, p.AMaterno,c.Nombre AS carrera, s.tipo_solicitud FROM  solicitudes s 
            INNER JOIN tutorado t ON t.NControl = s.Tutorado_NControl
            INNER JOIN persona p ON p.idPersona = t.Persona_idPersona
            INNER JOIN carrera c ON c.idCarrera = t.Carrera_idCarrera
            WHERE  s.idSolicitud =  (SELECT CAST($idsolicitud AS CHAR))");


        if($busqueda_tutorado->rowCount()==0){
            $alerta = [
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        $dat_info = $busqueda_tutorado -> fetchAll();
        return json_encode($dat_info);

    }

    //AlumnSolic solicitudes
    public function ver_tutorado_solic_controlador(){
        //$noctrl = mainModel::limpiar_cadena($_SESSION['NControl_sti']);
        $noctrl = mainModel::limpiar_cadena($_POST['idtutorado_solic']);
        if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
            $alerta = [
                "Response" => "error",
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }


        $busqueda_tutorado = usuarioModel::ejecutar_consulta_simple("SELECT t.NControl, p.Nombre, p.APaterno, p.AMaterno, r.Nombre as NombreCar  FROM persona p, tutorado t,  carrera r,generacion g WHERE t.NControl=$noctrl AND r.idCarrera = t.Carrera_idCarrera AND p.idPersona=t.Persona_idPersona");

        if($busqueda_tutorado->rowCount()==0){
            $alerta = [
                "Titulo" => "Ocurrio un error inesperado",
                "Texto" => "Ha ocurrido un error al consultar los datos, recargue la pagina para continuar",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }
        $dat_info = $busqueda_tutorado -> fetchAll();
        return json_encode($dat_info);

    }

    public function solicitud_cambio_tutor($nocontrol,$matricula){
        //$nocontrol = mainModel::limpiar_cadena($_POST['asig_ed_noctrl']);
        //$matricula = mainModel::limpiar_cadena($_POST['asig_ed_tut']);

        $datos_asignacion_upd = [
            "Matricula" => $matricula,
            "NControl" =>  $nocontrol
        ];
        $data = solicitudModel::actualizar_asignacion_modelo($datos_asignacion_upd);
        if($data->rowCount()==0){
            return 0;
        }else{
            solicitudModel::agregar_historicoasig_modelo($datos_asignacion_upd);
            return 1;

        }
    }
    public function validacion_solicitud_controlador(){
        $idSolicitud = mainModel::limpiar_cadena($_POST['idsolic']);
        $nocntrol = mainModel::limpiar_cadena($_POST['solic_nctrl']);
        $valid = mainModel::limpiar_cadena($_POST['validar_solic']);

        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM solicitudes WHERE idSolicitud='$idSolicitud'");

        if($consulta->rowCount() == 0) {
            echo '
                <script>
                    Swal.fire({
                      title: "Error al validar la solictud",
                      text: "Ha ocurrido un error al validar la solicitud, inténtelo de nuevo ",
                      type: "error",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                    if(result.value){
                        window.location="' . SERVERURL . 'CCSolicitudes"
                      }
                });
                </script>
            
            ';
            exit();

        }
        $consulta=$consulta->fetch();
        $tipo = $consulta['tipo_solicitud'];
        $respuesta = '';

        if($valid == '1'){
            if($tipo == 'Solicitar cambio de Tutor'){
                $matricula = $consulta['Trabajador_Matriculanuevo'];
                $respuesta = $this->solicitud_cambio_tutor($nocntrol,$matricula);
                /* echo "<script>alert('nctrl:|$nocntrol| matricula:|$matricula| resp:|$respuesta| val:|$valid|  id:|$idSolicitud|')</script>";
                exit(); */
            }elseif($tipo == 'Solicitar constancia'){
                $consulta = mainModel::ejecutar_consulta_simple("SELECT idActividades FROM actividades");
                $consul_act = mainModel::ejecutar_consulta_simple("SELECT Actividades_idActividades FROM actividades_asignadas WHERE Tutorado_NControl = $nocntrol AND Estatus = 'Validado'");

                $datAct = $consulta->fetchAll(); // id de Actividades asignadas
                $datAcTu = $consul_act->fetchAll(); // id de Actividades validadas alumnos
                $aux = '' ;
            //                $exit = false;
                for ($i = 0 ; $i < $consulta->rowCount() ; $i++){
                    $exit = false;
                    for ($j = 0 ; $j < $consul_act->rowCount() ; $j++){
                        if($datAct[$i][0] == $datAcTu[$j][0]){
                            $exit = true;
                        }

                    }
                    $aux = $datAct[$i][0];
                    if($exit == false){
                        $valid = '2';
                        break;
                    }
                }
                if($valid == 1){
                    $respuesta = 1;
                    solicitudModel::ejecutar_consulta_simple("INSERT INTO  liberacion_const(Tutorado_NControl,Coordinador_Matricula,Fecha_liberacion) VALUES ($nocntrol,".$_SESSION['matricula_sti'].",CURDATE())");
                }
            }elseif ($tipo == 'Solicitar revisión de actividad'){
                $respuesta=1;

            }else{
                echo '
                    <script>
                        Swal.fire({
                          title: "Error al validar la solictud",
                          text: "El tipo de solicitud no existe",
                          type: "error",
                          confirmButtonText: "Aceptar"
                       }).then((result)=>{
                        if(result.value){
                            window.location="'.SERVERURL.'CCSolicitudes"
                          }
                    });
                    </script>
                    
                    ';
            }

        }
        if (($valid == '1' && $respuesta == 1)  || $valid == '2' ){
            $texto='';
            $urlenvio = '';
            if ($tipo == 'Solicitar revisión de actividad'){
                $texto='Esta a punto de ser redireccionado al apartado de revisión de actividades del Tutorado con NControl: '.$nocntrol;
                $urlenvio = 'CCarreraAct/'.$nocntrol;

            }else{
                $texto='Solicitud atendida y validada correctamente';
                $urlenvio = 'CCSolicitudes';
            }

            echo '
                <script>
                    Swal.fire({
                      title: "Solicitud atendida",
                      text: "'.$texto.'",
                      type: "success",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                    if(result.value){
                        window.location="'.SERVERURL.$urlenvio.'"
                      }
                });
                </script>

                ';
            solicitudModel::actualizar_solicitud_modelo($valid,$idSolicitud);
        }else{
            echo '
                <script>
                    Swal.fire({
                      title: "Ocurrió un error inesperado",
                      text: "Ha ocurrido un error al validar la solicitud, inténtelo de nuevo  status'.$valid.', respuesta: '.$respuesta.'",
                      type: "error",
                      confirmButtonText: "Aceptar"
                   }).then((result)=>{
                    if(result.value){
                        window.location="'.SERVERURL.'CCSolicitudes"
                      }
                });
                </script>

                ';

        }
    }
    public function valida_liberacion(){
        $respuesta = mainModel::ejecutar_consulta_simple("SELECT * FROM liberacion_const WHERE Tutorado_NControl = '".$_SESSION['NControl_sti']."'");

        if($respuesta->rowCount() == 0 ){
            return false;

        }
        return true;

    }

}
