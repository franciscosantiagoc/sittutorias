<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/actividadesController.php";
$ins_actividad = new actividadesController();
if(isset($_POST['idAcActividad'])){
    $respuesta= $ins_actividad->consulta_acactividad_controlador();
    echo json_encode($respuesta);
    /* echo 'Respuesta actividad ajax';*/
}if(isset($_POST['del_idActividad'])){
    $respuesta= $ins_actividad->eliminar_actividad_controlador();
    echo json_encode($respuesta);



} else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}

?>