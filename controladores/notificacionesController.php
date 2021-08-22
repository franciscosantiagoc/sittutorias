<?php
if($peticionAjax){
    require_once "../modelos/mainModel.php";
}else{
    require_once "./modelos/mainModel.php";
}

class notificacionesController extends mainModel {
    public function consultanotif_controlador(){
        $iduser=mainModel::limpiar_cadena($_POST['idnotifi']);
        $consulta=mainModel::ejecutar_consulta_simple("SELECT * FROM notificaciones WHERE Destinatario=$iduser AND Leido=0");
        $dat_consulta=$consulta->fetchAll();


        mainModel::ejecutar_consulta_simple("UPDATE notificaciones SET Leido=1 WHERE Destinatario=$iduser");
        if($consulta->rowCount()!=0)
            echo json_encode($dat_consulta);
    }
}