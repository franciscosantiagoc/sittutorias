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
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Descripcion, Semestrerealizacion_sug FROM actividades;");
      $dat_info = $consulta_actividades -> fetchAll(); 
      $resultado = [];
      foreach($dat_info as $row){
         $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $row['idActividades'] .' AND Tutorado_NControl=' . $ncontrol . ';');
         if($consult_entrega->rowCount() > 0){
            $row['Estado']= 'Entregado';
         }else{
            $row['Estado']= 'No entregado';
         }

         array_push($resultado, $row);
      }
      return $resultado;
            
   }
 
   
}
