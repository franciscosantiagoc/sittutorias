<?php
require_once "../config/APP.php";

$peticionAjax = true;
if(isset($_POST['idActividad'])){
    require_once "../controladores/actividadesController.php";
    $ins_actividad = new actividadesController();
    $respuesta= $ins_actividad->consulta_actividad_controlador($_POST['idActividad']);
    echo json_encode($respuesta);
    /* echo 'Respuesta actividad ajax';*/
}elseif(isset($_POST['idActividad_tutor'])){
    require_once "../controladores/actividadesController.php";
    $ins_actividad = new actividadesController();
    echo $ins_actividad->consulta_actividadtutorado_controlador();

    /* echo 'Respuesta actividad ajax';*/
}else{
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>