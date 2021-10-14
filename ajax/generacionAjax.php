<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/generacionController.php";
$ins_gener = new generacionController();
if(isset($_POST['idAcGener'])){
    $respuesta= $ins_gener->consulta_ac_generacion_controlador();
    echo json_encode($respuesta);
}elseif(isset($_POST['del_idGener'])){
    $respuesta= $ins_gener->eliminar_generacion_controlador();
    echo json_encode($respuesta);

} else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}

?>