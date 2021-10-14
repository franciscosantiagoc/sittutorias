<?php
if ($peticionAjax) {
   require_once "../modelos/carrerasModel.php";
} else {
   require_once "./modelos/carrerasModel.php";
}

class carrerasController extends carrerasModel
{

    public function consulta_ac_carrera_controlador()
    {
        $idCarrera=mainModel::limpiar_cadena($_POST['idAcCarrera']);
        $idAcArea=mainModel::limpiar_cadena($_POST['idAcCArea']);
        $consulta_carrera = mainModel::ejecutar_consulta_simple("SELECT c.idCarrera,a.Nombre AS Nombre_Area,c.Nombre,c.Areas_idAreas FROM  carrera c,areas a  WHERE a.idAreas=c.Areas_idAreas AND c.Areas_idAreas = $idAcArea AND c.idCarrera=$idCarrera;");
        $dat_info = $consulta_carrera -> fetchAll();
        return $dat_info;


    }

    public function actualizar_carrera_controlador()
    {
        $idac_carrera = mainModel::limpiar_cadena($_POST['idaccarrera']);
        $idac_area = mainModel::limpiar_cadena($_POST['idaccarea']);
        $nombrecarrera = mainModel::limpiar_cadena($_POST['nombreaccarrera']);


        if ($idac_carrera == ""  || $nombrecarrera == ""  ) {
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
        if (mainModel::verificar_datos("[0-9-]{4,8}", $idac_carrera)) {
            echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del id de la carrera no es válido",
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

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,50}", $nombrecarrera)) {
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

        $datos_carrera_upd = [
            "idAcCarrera" =>$idac_carrera,
            "idActArea" => $idac_area,
            "NombreActCarrera" => $nombrecarrera

        ];

        $actualizar_carrera = carrerasModel::actualizar_carreras_modelo($datos_carrera_upd);

        if($actualizar_carrera->rowCount()==1){
            echo '
            <script>
               Swal.fire({
                  title: "Carrera Actualizada",
                  text: "Los datos se han actualizado correctamente",
                  type: "success",
                  confirmButtonText: "Aceptar"
               }).then((result)=>{
                  if(result.value){
                     window.location="'.SERVERURL.'RootOtros"
                  }
               });
            </script>
            ';
            exit();

        }else{
            echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos, modifique los datos para continuar",
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

    }

    public function registrar_carrera_controlador(){
        $idcarrera = mainModel::limpiar_cadena($_POST['idcarrera']);
        $idarea = mainModel::limpiar_cadena($_POST['idarea']);
        $nombrecarrera = mainModel::limpiar_cadena($_POST['nombrecarrera']);

        $check_idcarrera = mainModel::ejecutar_consulta_simple("SELECT * FROM carrera WHERE idCarrera=$idcarrera");
        if ($check_idcarrera->rowCount() != 0) {
            echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Se ha detectado un error, el id de la carrera ya existe ",
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



        if ($idcarrera == "" || $nombrecarrera == "" ) {
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


        if (mainModel::verificar_datos("[0-9-]{4,8}", $idcarrera)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del id de la carrera no es válido",
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

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,50}", $nombrecarrera)) {
            echo '
            <script> 
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "El formato del Nombre de la carrera no es válido",
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


        $datos_carrera_upd = [
            "idCarrera" => $idcarrera,
            "idArea"=> $idarea,
            "Nombre" => $nombrecarrera

        ];

        $registro_carrera = carrerasModel::registrar_carrera_modelo($datos_carrera_upd);

        if($registro_carrera->rowCount()!= 0 ){//comprobando realizacion de actualizacion

            echo '
          <script> 
             Swal.fire({
                title: "Registro de carrera exitoso",
                text: "Se ha registrado la carrera correctamente",
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
                 text: "Error al registrar la carrera, recargue la pagina para continuar",
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

   public function eliminar_carrera_controlador(){
       $id_del_carrera=mainModel::limpiar_cadena($_POST['del_idCarrera']);
       $respuesta=mainModel::ejecutar_consulta_simple("DELETE FROM carrera WHERE idCarrera=$id_del_carrera");
       if($respuesta->rowCount() == 0){
           $alerta=[
               'Titulo'=> "Error",
               'Texto' => "Error al eliminar la carrera, intente de nuevo",
               'Tipo' => "error"
           ];
           echo json_encode($alerta);
           exit();

       }else{
           $alerta=[
               'Titulo'=> "Carrera eliminada",
               'Texto' => "La carrera se ha eliminado correctamente",
               'Tipo' => "success"
           ];
           echo json_encode($alerta);
           exit();

       }
    }

   public function consulta_de_carreras_controlador()
    {
        // Por parte de Direct
        //$idarea=mainModel::limpiar_cadena($_POST['idAcActividad']);
        $consulta_areas = mainModel::ejecutar_consulta_simple("SELECT c.idCarrera,a.Nombre AS Nombre_Area,c.Nombre, c.Areas_idAreas FROM areas a, carrera c WHERE c.Areas_idAreas=a.idAreas ;");
        $dat_info = $consulta_areas -> fetchAll();
        return $dat_info;
    }
 
   
}
