<?php
require_once "../config/APP.php";

$peticionAjax = true;
require_once "../controladores/tutoresController.php";
$ins_informacionCArea = new tutoresController();
// ocupado en CCTutores
if(isset($_POST['idInfoTES'])){
    $respuesta= $ins_informacionCArea->consulta_t_unico($_POST['idInfoTES']);
    echo json_encode($respuesta);
// ocupado en AlumnInfo
}elseif(isset($_POST['idInfoTutores'])){
    $respuesta= $ins_informacionCArea->conocer_tutores2_controlador($_POST['idInfoTutores']);
    echo json_encode($respuesta);
}elseif(isset($_POST['idAcJDepto'])){
    $respuesta= $ins_informacionCArea->actualizar_jdepto_controlador($_POST['idAcJDepto']);
    echo json_encode($respuesta);
}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>