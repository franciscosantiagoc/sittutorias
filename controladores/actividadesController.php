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
         $registro_actividad = actividadesModel::entregar_actividad_modelo($datos_actividad_upd);
       
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

    public function agregar_actividad_controlador(){
        $idact = mainModel::limpiar_cadena($_POST['ridactividad']);
        $nombre = mainModel::limpiar_cadena($_POST['rnombreact']);
        $descripcion = mainModel::limpiar_cadena($_POST['rdescripcionact']);
        $semestresug =mainModel::limpiar_cadena($_POST['semestresug']);
        //$semestreoblig = false;
        if(isset($_POST['actoblig'])){
            $semestreoblig="activo";

        }else{
            $semestreoblig = "inactivo";

        }



        //$semestreoblig =$_POST['actoblig'];
        //$file = $_FILES['Ractivity-file'];




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
                  window.location="'.SERVERURL.'CCActividades"
               }
            });
         </script>
         ';
            exit();
        }

        if($_FILES['Ractivity-file']['name'] == null){
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "No ha cargado un archivo",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'CCActividades"
                  }
               });
            </script>
            ';
            exit();
        }

        $temp = $_FILES['Ractivity-file']['tmp_name'];
        $link_file='/directory/formats/'.$idact.'_'.$nombre.".pdf";
        $link_file=trim($link_file,' ');
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
                     window.location="'.SERVERURL.'CCActividades"
                  }
               });
         </script>
         ';
            exit();
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
                    window.location="'.SERVERURL.'CCActividades"
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
                    window.location="'.SERVERURL.'CCActividades"
                 }
              });
           </script>
           ';
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
