<?php
if ($peticionAjax) {
   require_once "../modelos/generacionModel.php";
} else {
   require_once "./modelos/generacionModel.php";
}

class generacionController extends generacionModel
{

    public function consulta_ac_generacion_controlador()
    {
        $idGener=mainModel::limpiar_cadena($_POST['idAcGener']);
        $consulta_gener = mainModel::ejecutar_consulta_simple("SELECT idGeneracion,fecha_inicio,fecha_fin FROM  generacion WHERE idGeneracion= $idGener;");
        $dat_info = $consulta_gener -> fetchAll();
        return $dat_info;


    }

    public function actualizar_generacion_controlador()
    {
        $idgener = mainModel::limpiar_cadena($_POST['id_ac_gener']);
        $fecha_ini = mainModel::limpiar_cadena($_POST['fecha_act_ini']);
        $fecha_fin = mainModel::limpiar_cadena($_POST['fecha_act_fin']);

        if ($idgener == "" || $fecha_ini == "" || $fecha_fin == "" ) {
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
        if ($fecha_ini  >= $fecha_fin  ) {
            echo '
            
            <script> 
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La fecha de inicio no es correcta,inténtelo de nuevo",
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

        $datos_gener_upd = [
            "idActGener" =>$idgener,
            "ActFecha_ini" => $fecha_ini,
            "ActFecha_fin" => $fecha_fin

        ];

        $actualizar_gener = generacionModel::actualizar_gener_modelo($datos_gener_upd);

        if($actualizar_gener->rowCount()==1){
            echo '
            <script>
               Swal.fire({
                  title: "Generación Actualizada",
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

        }else{
            echo '
            <script>
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "Error al actualizar los datos de generacion, modifique los datos para continuar",
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

    public function registrar_generacion_controlador(){
        $idgener = mainModel::limpiar_cadena($_POST['id_gener']);
        $fecha_ini = mainModel::limpiar_cadena($_POST['fecha_reg_ini']);
        $fecha_fin = mainModel::limpiar_cadena($_POST['fecha_reg_fin']);

        $check_idgener = mainModel::ejecutar_consulta_simple("SELECT * FROM generacion WHERE idGeneracion=$idgener");
        if ($check_idgener->rowCount() != 0) {
            echo '
         <script> 
            Swal.fire({
               title: "Ocurrio un error inesperado",
               text: "Se ha detectado un error, el id de la generación ya existe ",
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


        if ($idgener == "" || $fecha_ini == "" || $fecha_fin == "" ) {
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
        if ($fecha_ini  >= $fecha_fin  ) {
            echo '
            
            <script> 
             
               Swal.fire({
                  title: "Ocurrio un error inesperado",
                  text: "La fecha de inicio no es correcta,inténtelo de nuevo",
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


        $datos_gener_upd = [
            "idGener" => $idgener,
            "fecha_ini"=> $fecha_ini,
            "fecha_fin" => $fecha_fin

        ];

        $registro_gener = generacionModel::registrar_gener_modelo($datos_gener_upd);

        if($registro_gener->rowCount()!= 0 ){//comprobando realizacion de actualizacion

            echo '
          <script> 
             Swal.fire({
                title: "Registro de la generación exitosa",
                text: "Se ha registrado la generación correctamente",
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
                 text: "Error al registrar la generación, recargue la pagina para continuar",
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

   public function eliminar_generacion_controlador(){
       $id_del_gener=mainModel::limpiar_cadena($_POST['del_idGener']);
       $respuesta=mainModel::ejecutar_consulta_simple("DELETE FROM generacion WHERE idGeneracion=$id_del_gener");
       if($respuesta->rowCount() == 0){
           $alerta=[
               'Titulo'=> "Error",
               'Texto' => "Error al eliminar la generación, intente de nuevo",
               'Tipo' => "error"
           ];
           echo json_encode($alerta);
           exit();

       }else{
           $alerta=[
               'Titulo'=> "Generación eliminada",
               'Texto' => "La generación se ha eliminado correctamente",
               'Tipo' => "success"
           ];
           echo json_encode($alerta);
           exit();

       }
    }

   public function consulta_de_generacion_controlador()
    {
        //$idarea=mainModel::limpiar_cadena($_POST['idAcActividad']);
        $consulta_gener = mainModel::ejecutar_consulta_simple("SELECT idgeneracion, DATE_FORMAT(fecha_inicio,'%D %M %Y' ) as date_ini, DATE_FORMAT(fecha_fin,'%D %M %Y') as date_fin FROM generacion  ;");
        $dat_info = $consulta_gener -> fetchAll();
        return $dat_info;
    }
 
   
}
