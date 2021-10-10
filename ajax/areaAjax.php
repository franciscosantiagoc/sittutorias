<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/areasController.php";
$ins_area = new areasController();
if(isset($_POST['idAcArea'])){
    $respuesta= $ins_area->consulta_acarea_controlador();
    echo json_encode($respuesta);
    /* echo 'Respuesta actividad ajax';*/
}elseif(isset($_POST['del_idArea'])){
    $respuesta= $ins_area->eliminar_area_controlador();
    echo json_encode($respuesta);

} else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}

?>