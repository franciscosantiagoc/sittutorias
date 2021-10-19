<?php
if ($peticionAjax) {
   require_once "../modelos/actividadesModel.php";
} else {
   require_once "./modelos/actividadesModel.php";
}

class actividadesController extends actividadesModel
{

   public function consulta_actividades_controlador($ncontrol)
   {  
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, Semestrerealizacion_sug,Semestre_obligatorio AS Obligatorio, URLFormato FROM actividades;");
      $dat_info = $consulta_actividades -> fetchAll(); 
      $resultado = [];
      foreach($dat_info as $row){
         $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $row['idActividades'] .' AND Tutorado_NControl=' . $ncontrol .';');
          $rowsub=$consult_entrega->fetch();
         if($consult_entrega->rowCount() > 0){
            $row['Estado']= $rowsub['Estatus'];
            $row['Fecha']= $rowsub['Fecha'];
         }else{
            $row['Estado']= 'No entregado';
            $row['Fecha']=  'Sin fecha de entrega';
         }
         
         array_push($resultado, $row);
      }
      return $resultado; 
            
   }


   public function consulta_actividad_controlador($idactividad)
   {  // coregir la variable
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, URLFormato FROM actividades WHERE idActividades=$idactividad;");
      $dat_info = $consulta_actividades -> fetchAll();
      return $dat_info; 
            
   }

   public function consulta_actividadtutorado_controlador()
    {  // coregir la variable
        $idactividad = mainModel::limpiar_cadena($_POST['idActividad_tutor']);
        $ncontrol= mainModel::limpiar_cadena($_POST['ncontrolActividad_tutor']);
        $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT t.NControl,a.idActividades,CONCAT(p.Nombre,' ',p.APaterno,' ',p.AMaterno) AS Nombre,a.Nombre AS NActividad,aa.Fecha, aa.URLFile FROM actividades_asignadas aa, actividades a, tutorado t, persona p WHERE aa.Actividades_idActividades=$idactividad AND aa.Tutorado_NControl=$ncontrol AND a.idActividades=aa.Actividades_idActividades AND t.NControl=aa.Tutorado_NControl AND p.idPersona=t.Persona_idPersona");

        if($consulta_actividades->rowCount()==0){
            $alerta = [
                "Titulo"=>"Error inesperado",
                "Texto"=>"Ha ocurrido un error, recargue la página para continuar",
                "Tipo"=>"error"
            ];
            echo json_encode($alerta);
        }


        $consulta_actividades = $consulta_actividades -> fetch();
        return json_encode($consulta_actividades);

    }

   
   public function consulta_acactividad_controlador()
    {
        $idactividad=mainModel::limpiar_cadena($_POST['idAcActividad']);
        $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, Semestrerealizacion_sug FROM actividades WHERE idActividades=$idactividad;");
        $dat_info = $consulta_actividades -> fetchAll();
        return $dat_info;

    }

   public function actualizar_actividad_controlador()
{
    $idac_actividad = mainModel::limpiar_cadena($_POST['idacactividad']);
    $nombre = mainModel::limpiar_cadena($_POST['nombreacact']);
    $descripcion = mainModel::limpiar_cadena($_POST['descripcionacact']);
    $semestre_sug = mainModel::limpiar_cadena($_POST['semestresugac']);



    if ($idac_actividad == "" || $nombre == "" || $descripcion == "" || $semestre_sug == "" ) {
        echo '
            </script>
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellenelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }


    if (mainModel::verificar_datos("[0-9-]{4,8}", $idac_actividad)) {
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del id de la actividad no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }

    if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,50}", $nombre)) {
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del Nombre de la actividad no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }
    if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,70}", $descripcion)) {
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato de la descripcion de la actividad, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }

    if ($semestre_sug < 1 || $semestre_sug > 12  ) {
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Se ha detectado un error con el semestre sugerido seleccionado",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }


    if($_FILES['Acactivity-file']['name'] == null){
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No ha cargado un archivo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
        exit();
    }

    $link_file='/directory/formats/'.$idac_actividad.'_'.$nombre.".pdf";
    $link_file=trim($link_file,' ');
    $archivo = '.'.$link_file;

    $datos_usuario_upd = [
        "idAcActividad" =>$idac_actividad,
        "Nombre" => $nombre,
        "Descripcion" => $descripcion,
        "Semestre_sug" => $semestre_sug,
        "URLFile" => $link_file

    ];


    $actualizar_usuario = actividadesModel::actualizar_actividades_modelo($datos_usuario_upd);

    if($actualizar_usuario->rowCount()==1){//comprobando realizacion de actualizacion
        echo '
            <script> 
               Swal.fire({
                  title: "Actividad Actualizada",
                  text: "Los datos de la actividad se han actualizado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';

    }else{
        echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, modifique los datos para continuar",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
    }

}

   public function actualizar_calif_controlador()
    {
        $id_actividad = mainModel::limpiar_cadena($_POST['idEditActividad']);
        $ncontrol = mainModel::limpiar_cadena($_POST['idAlEditActividad']);
        $calif = mainModel::limpiar_cadena($_POST['caleditact']);
        //$comment= mainModel::limpiar_cadena($_POST['commeditact']);

        $comment=$_POST['commeditact'];

        $check_act=mainModel::ejecutar_consulta_simple("SELECT idActividades FROM actividades Where idActividades=$id_actividad");
        if($check_act->rowCount()==0){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ha ocurrido un error al enviar los datos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>';
            exit();
        }

        $check_nctrl=mainModel::ejecutar_consulta_simple("SELECT NControl FROM tutorado Where NControl=$ncontrol");
        if($check_nctrl->rowCount()==0){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ha ocurrido un error al enviar los datos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>';
            exit();
        }

        if($calif!="10" && $calif!="9" && $calif!="8" && $calif!="8" && $calif!="5"  && $calif!="no-check"){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Ha ocurrido un error al enviar la valoración de la actividad",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>';
            exit();
        }
        /* echo "
            <script> console.log('$comment');
            </script>
            "; 
        exit();*/
        if($calif=="no-check" && $comment==""){
         echo '
         <script> 
         
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Debe agregar el motivo por el cual rechazó la actividad",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location=window.location;
               }
            });
         </script>
         ';
         exit();
        }
        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ,. ]{0,150}", $comment)) {
         echo '
            <script> 
            
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El campo comentario solo acepta carácteres alfanumericos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>
            ';
            exit();
         }

        
        if($comment=="") $comment='Buen trabajo';

        $datos_usuario_upd = [
            "idActividad" =>$id_actividad,
            "NControl"=>$ncontrol,
            "calif"=>$calif,
            "comment"=>$comment

        ];


        $actualizar_act = actividadesModel::valida_actividad_modelo($datos_usuario_upd);

        if($actualizar_act->rowCount()==1){//comprobando realizacion de actualizacion
            echo '
            <script> 
               Swal.fire({
                  title: "Evaluación enviada",
                  text: "La actividad se ha evaluado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>';
            exit();

        }else{
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al evaluar la actividad",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location=window.location;
                  }
               });
            </script>';
            exit();
        }

    }

   public function agregar_entregaactividad_controlador(){
      $idact = mainModel::limpiar_cadena($_POST['ideditactiv']);
      $nctrl = mainModel::limpiar_cadena($_POST['idaleditactiv']);
      if(empty($nctrl) || empty($nctrl)){
         echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Se han detectado campos vacios, recargue la pagina para continuar",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location="'.SERVERURL.'AlumnAct"
               }
            });
         </script>
         ';
         exit();
      }

      $check_nctrl = mainModel::ejecutar_consulta_simple("SELECT * FROM tutorado WHERE NControl=$nctrl");
      if ($check_nctrl->rowCount() == 0) {
         echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Ha ocurrido un error al cargar el No. de control, recargue la pagina para continuar",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location="'.SERVERURL.'AlumnAct"
               }
            });
         </script>
         ';
         exit();
      }
      $check_idact = mainModel::ejecutar_consulta_simple("SELECT * FROM actividades WHERE idActividades=$idact");
      if ($check_idact->rowCount() == 0) {
         echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Ha ocurrido un error al cargar la actividad, recargue la pagina para continuar",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location="'.SERVERURL.'AlumnAct"
               }
            });
         </script>
         ';
         exit();
      }

      if($_FILES['activity-file']['name'] == null){
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No ha cargado un archivo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'AlumnAct"
                  }
               });
            </script>
            ';
        exit();
      }

      $temp = $_FILES['activity-file']['tmp_name'];
      $link_file='/directory/Activitiesdelivered/'.$idact.'_'.$nctrl.".pdf";
      $archivo = '.'.$link_file;

      if (move_uploaded_file($temp, $archivo) ) {
         //Cambiamos los permisos
         chmod($archivo, 0777);
      }else{
         echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Error al cargar la imagen al servidor, intente nuevamente",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'AlumnAct"
                  }
               });
         </script>
         ';
         exit();
      }
      //$date = date('YY-mm-dd');
       $check_idact = mainModel::ejecutar_consulta_simple("SELECT * FROM actividades_asignadas WHERE Actividades_idActividades=$idact AND Tutorado_NControl=$nctrl");



      $datos_actividad_upd = [
         "idActividad" => $idact,
         "NControl" => $nctrl,
         "URLFile" => $link_file,
         //"Fecha" => $date,
         "Status" => 'En espera'
      ];
       //echo "<script>alert($date);</script>"; /**/


      if($check_idact->rowCount()!=0){
          $registro_actividad = actividadesModel::actualizar_actividadasignada_modelo($datos_actividad_upd);
       }else {
          $registro_actividad = actividadesModel::entregar_actividad_modelo($datos_actividad_upd);
      }
      /**/

     if($registro_actividad){//comprobando realizacion de actualizacion
        echo '
           <script> 
              Swal.fire({
                 title: "Actividad entregada",
                 text: "Se ha entregado la actividad correctamente",
                 type: "success",
                 confirmButtonText: "Aceptar"
              }).then((result)=>{
                 if(result.value){
                    window.location="'.SERVERURL.'AlumnAct"
                 }
              });
           </script>
           ';

     }else{
        echo '
           <script> 
              Swal.fire({
                 title: "Ocurrio un error inesperado",
                 text: "Error al registrar la actividad, recargue la pagina para continuar",
                 type: "error",
                 confirmButtonText: "Aceptar"
              }).then((result)=>{
                 if(result.value){
                    window.location="'.SERVERURL.'AlumnAct"
                 }
              });
           </script>
           ';
     }


   }

   public function agregar_actividad_controlador(){
        $idact = mainModel::limpiar_cadena($_POST['ridactividad']);
        $nombre = mainModel::limpiar_cadena($_POST['rnombreact']);
        $descripcion = mainModel::limpiar_cadena($_POST['rdescripcionact']);
        $semestresug =mainModel::limpiar_cadena($_POST['semestresug']);
        if(isset($_POST['actoblig'])){
            $semestreoblig="activo";

        }else{
            $semestreoblig = "inactivo";

        }

        $check_idact = mainModel::ejecutar_consulta_simple("SELECT * FROM actividades WHERE idActividades=$idact");
        if ($check_idact->rowCount() != 0) {
            echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Se ha detectado un error, el id de la actividad ya existe ",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location="'.SERVERURL.'RootActividades"
               }
            });
         </script>
         ';
            exit();
        }

        $link_file= "";

        if($_FILES['Ractivity-file']['name'] == null && $semestreoblig == "inactivo"){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No ha cargado un archivo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootActividades"
                  }
               });
            </script>
            ';
            exit();

        }elseif($_FILES['Ractivity-file']['name'] != null ){
            $link_file='/directory/formats/'.$idact.'_'.$nombre.".pdf";
            $link_file=trim($link_file,' ');

        }



        if($semestreoblig == "activo"){
            $semestreoblig = 1;

        }else{
            $semestreoblig = 0;
        }

        $datos_actividad_upd = [
            "idActividad" => $idact,
            "Nombre"=> $nombre,
            "Descripcion" => $descripcion,
            "Semestre_Sug" =>$semestresug,
            "Semestre_Oblig" =>$semestreoblig,
            "URLFile" => $link_file
        ];

        $registro_actividad = actividadesModel::registrar_actividad_modelo($datos_actividad_upd);






        if($registro_actividad->rowCount()!= 0 ){//comprobando realizacion de actualizacion

            echo '
          <script> 
             Swal.fire({
                title: "Actividad entregada",
                text: "Se ha entregado la actividad correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
             }).then((result)=>{
                if(result.value){
                    window.location="'.SERVERURL.'RootActividades"
                }
              });
           </script>
           ';

        }else{
            echo '
           <script> 
              Swal.fire({
                 title: "Ocurrio un error inesperado",
                 text: "Error al registrar la actividad, recargue la pagina para continuar",
                 type: "error",
                 confirmButtonText: "Aceptar"
              }).then((result)=>{
                 if(result.value){
                    window.location="'.SERVERURL.'RootActividades"
                 }
              });
           </script>
           ';
        }


    }

   public function eliminar_actividad_controlador(){
       $idactividad=mainModel::limpiar_cadena($_POST['del_idActividad']);
       $respuesta=mainModel::ejecutar_consulta_simple("DELETE FROM actividades WHERE idActividades=$idactividad");
       if($respuesta->rowCount() == 0){
           $alerta=[
               'Titulo'=> "Error",
               'Texto' => "Error al eliminar, la actividad ya ha sido entregada por un alumno",
               'Tipo' => "error"
           ];
           echo json_encode($alerta);
           exit();

       }else{
           $alerta=[
               'Titulo'=> "Actividad eliminada",
               'Texto' => "La actividad se ha eliminado correctamente",
               'Tipo' => "success"
           ];
           echo json_encode($alerta);
           exit();

       }
    }

   public function consulta_de_actividad_controlador($ncontrol)
    {
        $consulta_actividad = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Fecha_registro ,Descripcion, Semestrerealizacion_sug FROM actividades;");
        $dat_info = $consulta_actividad -> fetchAll();
        $resultado = [];
        foreach($dat_info as $rows){
            $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $rows['idActividades'] .' AND Tutorado_NControl=' . $ncontrol . ';');
            $rowsub=$consult_entrega->fetch();
            if($consult_entrega->rowCount() > 0){
                $rows['Estado']= $rowsub['Estatus'];
            }else{
                $rows['Estado']= 'No entregado';
            }
            array_push($resultado, $rows);
        }
        return $resultado;
    }
 
   
}
