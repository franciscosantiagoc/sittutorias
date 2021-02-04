<?php
    require_once "../modelos/loginModelo.php";
    /* require '../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $consulta = $MU->listar_combo_departamento();
    echo json_encode($consulta); */

    function listar_combo_departamento(){
        $sql = "call SP_LISTAR_COMBO_DEPARTAMENTO";
        $arreglo = array();
        /* $check_email = mainModel::ejecutar_consulta_simple("SELECT Correo FROM persona WHERE Correo='$email'");

        if($datos_cuenta->rowCount()==1){
            $row=$datos_cuenta->fetch(); */

            $_SESSION['nombre_sti']=$row['Nombre'];


        }
       /*  if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consulta_VU;
            } 
            return $arreglo;
            $this->conexion->cerrar();
        }*/
    }


?>