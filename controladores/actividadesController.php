<?php
if ($peticionAjax) {
   require_once "../modelos/usuarioModel.php";
} else {
   require_once "./modelos/usuarioModel.php";
}

class actividadesController extends usuarioModel
{
   /*-------------- Controlador agregar usuario --------------*/

   /* == controlador actualizar trabajador */
   public function consulta_actividades_controlador($ncontrol)
   {  
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, Semestrerealizacion_sug, URLFormato FROM actividades;");
      $dat_info = $consulta_actividades -> fetchAll(); 
      $resultado = [];
      foreach($dat_info as $row){
         $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $row['idActividades'] .' AND Tutorado_NControl=' . $ncontrol .';');
         if($consult_entrega->rowCount() > 0){
            $row['Estado']= 'Entregado';
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
      if(!empty($nctrl) && !empty($nctrl)){
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

      if(!isset($_FILES['activity-file'])){
         echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No ha cargado un archivo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               });
            </script>
            ';
        exit();
      }
   }
 
   
}
