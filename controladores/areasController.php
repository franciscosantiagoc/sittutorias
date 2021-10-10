<?php
if ($peticionAjax) {
   require_once "../modelos/areasModel.php";
} else {
   require_once "./modelos/areasModel.php";
}

class areasController extends areasModel
{



    public function consulta_acarea_controlador()
    {
        $idarea=mainModel::limpiar_cadena($_POST['idAcArea']);
        $consulta_areas = mainModel::ejecutar_consulta_simple("SELECT idAreas,Nombre,Descripcion FROM areas WHERE idAreas=$idarea;");
        $dat_info = $consulta_areas -> fetchAll();
        return $dat_info;

    }

    public function actualizar_area_controlador()
    {
        $idac_area = mainModel::limpiar_cadena($_POST['idacarea']);
        $nombrearea = mainModel::limpiar_cadena($_POST['nombreacarea']);
        $descripcion = mainModel::limpiar_cadena($_POST['descripcionacarea']);




        if ($idac_area == "" || $nombrearea == "" || $descripcion == ""  ) {
            echo '
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellénelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            
            ';
            exit();
        }


        if (mainModel::verificar_datos("[0-9-]{4,8}", $idac_area)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del id del área no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();
        }

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,50}", $nombrearea)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del Nombre del área no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
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
                  text: "El formato de la descripcion del área, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();
        }



        $datos_area_upd = [
            "idAcArea" =>$idac_area,
            "Nombre" => $nombrearea,
            "Descripcion" => $descripcion

        ];

        $actualizar_area = areasModel::actualizar_areas_modelo($datos_area_upd);

        if($actualizar_area->rowCount()==1){
            echo '
            <script> 
               Swal.fire({
                  title: "Àrea Actualizada",
                  text: "Los datos se han actualizado correctamente",
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

    public function registrar_area_controlador(){
        $idarea = mainModel::limpiar_cadena($_POST['idarea']);
        $nombrearea = mainModel::limpiar_cadena($_POST['nombrearea']);
        $descripcion = mainModel::limpiar_cadena($_POST['descripcionarea']);

        $check_idarea = mainModel::ejecutar_consulta_simple("SELECT * FROM areas WHERE idAreas=$idarea");
        if ($check_idarea->rowCount() != 0) {
            echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Se ha detectado un error, el id de la actividad ya existe ",
               type: "error",
               confirmButtonText: "Aceptar"
            }).then((result)=>{
               if(result.value){
                  window.location="'.SERVERURL.'RootOtros"
               }
            });
         </script>
         ';
            exit();
        }



        if ($idarea == "" || $nombrearea == "" || $descripcion == "" ) {
            echo '
            
            <script> 
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Algunos campos estan vacios, por favor rellénelos",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();
        }


        if (mainModel::verificar_datos("[0-9-]{4,8}", $idarea)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del id de la actividad no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();
        }

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,50}", $nombrearea)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del Nombre del área no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
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
                  text: "El formato de la descripcion del área, no es válido",
                  type: "error",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();
        }




        $datos_area_upd = [
            "idArea" => $idarea,
            "NombreArea"=> $nombrearea,
            "Descripcion" => $descripcion

        ];

        $registro_area = areasModel::registrar_area_modelo($datos_area_upd);

        if($registro_area->rowCount()!= 0 ){//comprobando realizacion de actualizacion

            echo '
          <script> 
             Swal.fire({
                title: "Registro de área exitoso",
                text: "Se ha registrado el área correctamente",
                type: "success",
                confirmButtonText: "Aceptar"
             }).then((result)=>{
                if(result.value){
                    window.location="'.SERVERURL.'RootOtros"
                }
              });
           </script>
           ';

        }else{
            echo '
           <script> 
              Swal.fire({
                 title: "Ocurrio un error inesperado",
                 text: "Error al registrar el área, recargue la pagina para continuar",
                 type: "error",
                 confirmButtonText: "Aceptar"
              }).then((result)=>{
                 if(result.value){
                    window.location="'.SERVERURL.'RootOtros"
                 }
              });
           </script>
           ';
        }


    }

   public function eliminar_area_controlador(){
       $idarea=mainModel::limpiar_cadena($_POST['del_idArea']);
       $respuesta=mainModel::ejecutar_consulta_simple("DELETE FROM areas WHERE idAreas=$idarea");
       if($respuesta->rowCount() == 0){
           $alerta=[
               'Titulo'=> "Error",
               'Texto' => "Error al eliminar el área, intente de nuevo",
               'Tipo' => "error"
           ];
           echo json_encode($alerta);
           exit();

       }else{
           $alerta=[
               'Titulo'=> "Área eliminada",
               'Texto' => "El Área se ha eliminado correctamente",
               'Tipo' => "success"
           ];
           echo json_encode($alerta);
           exit();

       }
    }

   public function consulta_de_areas_controlador()
    {
        // Por parte de Direct
        //$idarea=mainModel::limpiar_cadena($_POST['idAcActividad']);
        $consulta_areas = mainModel::ejecutar_consulta_simple("SELECT idAreas,Nombre,Descripcion FROM areas;");
        $dat_info = $consulta_areas -> fetchAll();
        return $dat_info;
    }
 
   
}
