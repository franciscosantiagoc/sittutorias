<?php
    if($peticionAjax){
        require_once "../config/SERVER.php";
    }else{
        require_once "./config/SERVER.php";
        require_once "./config/APP.php";
    }

    class mainModel{
        /*-------------- Funcion conectar a BD --------------*/
        protected static function conectar(){
            try {
                $conexion = new PDO(SGBD,USER, PASS);
                /*die("conexion con ".DBNAME." exitosa");*/
                 $conexion->exec("SET CHARACTER SET utf8"); 
                return $conexion;
            } catch (PDOException $pe) {
                die("Error al conectar con la base de datos ".DBNAME." :" . $pe->getMessage());
            }
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
		protected static function decryption($string){
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

        /*-------------- Funcion limpiar cadenas --------------*/
        protected static function limpiar_cadena($cadena){
            $cadena=str_ireplace("<script>","",$cadena);
            $cadena=str_ireplace("</script>","",$cadena);
            $cadena=str_ireplace("<script src>","",$cadena);
            $cadena=str_ireplace("<script type=>","",$cadena);
            $cadena=str_ireplace("SELECT * FROM","",$cadena);
            $cadena=str_ireplace("DELETE * FROM>","",$cadena);
            $cadena=str_ireplace("INSERT INTO","",$cadena);
            $cadena=str_ireplace("DROP TABLE","",$cadena);
            $cadena=str_ireplace("DROP DATABASE","",$cadena);
            $cadena=str_ireplace("TRUNCATE TABLE","",$cadena);
            $cadena=str_ireplace("SHOW TABLES","",$cadena);
            $cadena=str_ireplace("SHOW DATABASES","",$cadena);
            $cadena=str_ireplace("<?php","",$cadena);
            $cadena=str_ireplace("?>","",$cadena);
            $cadena=str_ireplace("--","",$cadena);
            $cadena=str_ireplace(">","",$cadena);
            $cadena=str_ireplace("[","",$cadena);
            $cadena=str_ireplace("]","",$cadena);
            $cadena=str_ireplace("^","",$cadena);
            $cadena=str_ireplace(";","",$cadena);
            $cadena=str_ireplace("::","",$cadena);
            $cadena=str_ireplace("==","",$cadena);
            $cadena=str_ireplace('"',"",$cadena);
            $cadena=stripslashes($cadena);/*elimina \ */
            $cadena=trim($cadena);
            return $cadena;
        }
    


        /*-------------- Funcion verificar datos --------------*/
        protected static function verificar_datos($filtro,$cadena){
            if(preg_match("/^".$filtro."$/",$cadena)){/* /^0-9$/ */
                return false;//valido
            }else{
                return true;//no valido

            }

        }

        /*-------------- Funcion verificar fecha --------------*/
        protected static function verificar_fecha($fecha){
            $valores=explode('-',$fecha);
            if(count($valores)==3 && checkdate($valores[1], $valores[2],$valores[0])){
                return false; //valido
            }else{
                return true; //no valido
            }

        }

        /*-------------- Funcion paginador de tablas --------------*/
        protected static function paginador_tabla($pagina,$Npaginas,$url,$botones){
            $tabla='<nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">';
            if($pagina==1){
                $tabla.='<li class="page-item disabled">
                            <a class="page-link">
                                <i class="fas fa-angle-double-left"></i>                    
                            </a>  
                        </li>';
            }else{
                $tabla.='<li class="page-item">
                            <a class="page-link" href="'.$url.'1/">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="'.$url.($pagina-1).'/">Anterior</a>
                        </li>
                        ';
            }

            $ci=0;
            for($i=$pagina;$i<=$Npaginas;$i++){
                if($ci>=$botones){
                    break;
                }

                if($pagina==$i){
                    $tabla.='
                    <li class="page-item">
                            <a class="page-link active" href="'.$url.$i.'/">'.$i.'
                            </a>
                    </li>';
                }else{
                    $tabla.='
                    <li class="page-item">
                            <a class="page-link" href="'.$url.$i.'/">'.$i.'
                            </a>
                        </li>';                    
                }
                $ci++;
            }

            if($pagina==$Npaginas){
                $tabla.='<li class="page-item disabled">
                            <a class="page-link">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>';
            }else{
                $tabla.='<li class="page-item">
                            <a class="page-link" href="'.$url.($pagina+1).'/">Siguiente</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="'.$url.$Npaginas.'/">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>

                        
                        ';
            }
            $tabla.='</ul></nav>';
            return $tabla;
        }

        protected static function notificacion($email, $mensaje){

            $fecha= time();
            $fechaFormato = date("j/n/Y",$fecha);

            $correoDestino = $email;
            
            //asunto del correo
            $asunto = "Enviado por " .COMPANY;

            $cabecera = "MIME-VERSION: 1.0\r\n";
            $cabecera .= "Content-type: multipart/mixed;";
            $cabecera .="boundary=\"=C=T=E=C=\"\r\n";
            $cabecera .= "From: {$email}";

            /* //Primera parte del cuerpo del mensaje
            $cuerpo = "--=C=T=E=C=\r\n";
            $cuerpo .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $cuerpo .= "\r\n"; // línea vacía
            $cuerpo .= "Correo enviado por: Sistema Institucional de Tutorias del Instituto Tecnológico del Istmo";
            $cuerpo .= "Fecha: " . $fechaFormato . "\r\n";
            $cuerpo .= "Mensaje: " . $mensaje . "\r\n";
            $cuerpo .= "\r\n";// línea vacía */

            $cuerpo = "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Mensaje</title>
                
                <style>
                    * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    }
                
                    .container {
                    max-width: 1000px;
                    width: 90%;
                    margin: 0 auto;
                    }
                    .bg-dark {
                    background: #343a40;
                    margin-top: 40px;
                    padding: 20px 0;
                    }
                    .alert {
                    font-size: 1.5em;
                    position: relative;
                    padding: .75rem 1.25rem;
                    margin-bottom: 2rem;
                    border: 1px solid transparent;
                    border-radius: .25rem;
                    }
                    .alert-primary {
                    color: #004085;
                    background-color: #cce5ff;
                    border-color: #b8daff;
                    }
                
                    .img-fluid {
                    max-width: 100%;
                    height: auto;
                    }
                
                    .mensaje {
                    width: 80%;
                    font-size: 20px;
                    margin: 0 auto 40px;
                    color: #eee;
                    }
                
                    .texto {
                    margin-top: 20px;
                    }
                
                    .footer {
                    width: 100%;
                    background: #48494a;
                    text-align: center;
                    color: #ddd;
                    padding: 10px;
                    font-size: 14px;
                    }
                    .footer span {
                    text-decoration: underline;
                    }
                </style>
                </head>
                <body>
                <div class='container'>
                    <div class='bg-dark'>
                    <div class='alert alert-primary'>
                        <strong>Mensaje automático del </strong>".COMPANY."
                    </div>
                
                    <div class='mensaje'>
                        <img class='img-fluid' src='https://istmo.tecnm.mx/wp-content/uploads/2020/01/pleca-gob2.png' height='150px' alt='Header ITISTMO'>
                
                        <div class='texto'>$mensaje</div>
                    </div>
                
                    <div class='footer'>
                        Puedes verificar la pagina entrando al ".COMPANY." o pulsando <span><a href='http://sit-itistmo.website'>Aquí</a></span>
                    </div>
                    </div>
                </div>
                </body>
                </html>
            ";
                
            //Enviar el correo
            mail($correoDestino, $asunto, $cuerpo, $cabecera)
        }
    }

?>