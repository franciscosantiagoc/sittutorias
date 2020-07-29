<?php
    if($peticionAjax){

        require_once "../config/SERVER";
    }else{
        require_once "./config/SERVER";
    }

    class mainModel{
        /*-------------- Funcion conectar a BD --------------*/
        protected static function conectar(){
            $conexion = new PDO(SGBD,USER, PASS);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;

        }

        /*-------------- Funcion ejecutar consultas simples --------------*/
        protected static function ejecutar_consulta_simple($consulta){
            $sql=self::conectar()->prepare($consulta);
            $sql->execute();
            return $sql;
        }

        /*-------------- Encriptacion de cadenas --------------*/
        public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SKEY);
			$iv=substr(hash('sha256', SIV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
        }
        
        /*-------------- Desencriptacion de cadenas --------------*/
		protected function decryption($string){
			$key=hash('sha256', SKEY);
			$iv=substr(hash('sha256', SIV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
        }
        
        /*-------------- Funcion generar codigos aleatorios --------------*/
        protected static function generar_codigo_aleatorio($letra,$longitud,$numero){
            for($i=1; $i<=$longitud;$i++){
                $aleatorio=rand(0,9);
                $letra.=$aleatorio;
            }
            return $letra."-".$numero;
        }
    }

?>