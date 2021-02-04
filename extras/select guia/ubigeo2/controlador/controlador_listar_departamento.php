<?php
    require '../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $consulta = $MU->listar_combo_departamento();
    echo json_encode($consulta);
?>