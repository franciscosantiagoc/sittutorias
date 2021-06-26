<?php
if ($peticionAjax) {
   require_once "../modelos/usuarioModel.php";
} else {
   require_once "./modelos/usuarioModel.php";
}

class actividadesController extends usuarioModel
{

   public function consulta_actividades_controlador($ncontrol)
   {
      $consulta_actividades = mainModel::ejecutar_consulta_simple("SELECT idActividades,Nombre,Fecha_registro ,Descripcion, Semestrerealizacion_sug FROM actividades;");
      $dat_info = $consulta_actividades -> fetchAll(); 
      $resultado = [];
      foreach($dat_info as $rows){
         $consult_entrega = mainModel::ejecutar_consulta_simple('SELECT * FROM actividades_asignadas WHERE Actividades_idActividades='. $rows['idActividades'] .' AND Tutorado_NControl=' . $ncontrol . ';');
         if($consult_entrega->rowCount() > 0){
            $rows['Estado']= 'Entregado';
         }else{
            $rows['Estado']= 'No entregado';
         }

         array_push($resultado, $rows);
      }
      return $resultado;
            
   }
 
   
}
