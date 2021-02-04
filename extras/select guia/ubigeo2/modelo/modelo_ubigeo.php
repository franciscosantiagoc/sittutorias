<?php
    class Modelo_Ubigeo{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this ->conexion->conectar();
        }

        function listar_combo_departamento(){
            $sql = "call SP_LISTAR_COMBO_DEPARTAMENTO";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_combo_provincia($iddepartamento){
            $sql = "call SP_LISTAR_COMBO_PROVINCIA('$iddepartamento')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_combo_distrito($idprovincia){
            $sql = "call SP_LISTAR_COMBO_DISTRITO('$idprovincia')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
    }

?>