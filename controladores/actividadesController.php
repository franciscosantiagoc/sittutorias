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
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, Semestrerealizacion_sug, URLFormato FROM actividades;");
      $dat_info = $consulta_actividades -> fetchAll(); 
      $resultado = [];
      foreach($dat_info as $row){
         $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $row['idActividades'] .' AND Tutorado_NControl=' . $ncontrol .';');
          $rowsub=$consult_entrega->fetch();
         if($consult_entrega->rowCount() > 0){
            $row['Estado']= $rowsub['Estatus'];
         }else{
            $row['Estado']= 'No entregado';
         }

         array_push($resultado, $row);
      }
      return $resultado; 
            
   }


   public function consulta_actividad_controlador($idactividad)
   {  
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, URLFormato FROM actividades WHERE idActividades=$idactividad;");
      $dat_info = $consulta_actividades -> fetchAll();
      return $dat_info; 
            
   }

   public function agregar_entregaactividad_controlador(){
      $idact = mainModel::limpiar_cadena($_POST['ideditactiv']);
      $nctrl = mainModel::limpiar_cadena($_POST['idaleditactiv']);
      /* $nombre = mainModel::limpiar_cadena($_POST['name_upd']); */
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
      //$link_img=str_replace(' ', '', $link_img);
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

       
      if($check_idact->rowCount()==0){ 
         $registro_actividad = actividadesModel::entregar_actividad_modelo($datos_actividad_upd);
       }else{
         $registro_actividad = actividadesModel::modificarstatus_actividad_modelo($datos_actividad_upd);
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
 
   
}
