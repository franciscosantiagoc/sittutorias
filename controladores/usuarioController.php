<?php
if ($peticionAjax) {
   require_once "../modelos/usuarioModel.php";
} else {
   require_once "./modelos/usuarioModel.php";
}

class usuarioController extends usuarioModel
{
   /*-------------- Controlador agregar usuario --------------*/

   /* == controlador actualizar trabajador */
   public function registro_usuario_controlador()
   {

      $nombre = mainModel::limpiar_cadena($_POST['name_upd']);
      $apellido_paterno = mainModel::limpiar_cadena($_POST['apellidop_upd']);
      $apellido_materno = mainModel::limpiar_cadena($_POST['apellidom_upd']);
      $fecha_nac = mainModel::limpiar_cadena($_POST['fecha_upd']);
      $sexo = mainModel::limpiar_cadena($_POST['sexo_upd']);
      $numero_telefono = mainModel::limpiar_cadena($_POST['numero_tel_upd']);
      $direccion = mainModel::limpiar_cadena($_POST['direccion_upd']);
      $email = mainModel::limpiar_cadena($_POST['email_upd']);
      $carrera = mainModel::limpiar_cadena($_POST['carrera_upd']);
      $noctrl = mainModel::limpiar_cadena($_POST['no_ctrl_upd']);

      /* == comprobar campos vacíos ==*/

      if ($nombre == "" || $apellido_paterno == "" || $apellido_materno == "" || $direccion == ""  || $noctrl == "") {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "No has llenado todos los campos que son obligatorios",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }




      /* == Verificando integridad de los datos ==*/

      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NOMBRE no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_paterno)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El APELLIDO PATERNO no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido_materno)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El APELLIDO MATERNO no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      if ($numero_telefono != "") {
         if (mainModel::verificar_datos("[0-9()+]{8,20}", $numero_telefono)) {
            $alerta = [
               "Alerta" => "simple",
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "El TELÉFONO no coincide con el formato solicitado",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
         }
      }

      if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}", $direccion)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "La DIRECCION no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      if (mainModel::verificar_datos("[0-9-]{8,10}", $noctrl)) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL no coincide con el formato solicitado",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      /* == comprbando No. Ctrl. == 
         if($select_usuario==16){//tutorado*/
      $columdb = "Matricula";
      $tabledb = "trabajador";

      /*}elseif($select_usuario>=13 || $select_usuario<=15){
           $columdb="Matricula";
           $tabledb="trabajador";
         }*/
      $condicion = "'$columdb' = '$noctrl'";
      /* $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT '$columdb' FROM '$tabledb' WHERE '$condicion'" ); */
      $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT Matricula FROM trbajador WHERE Matricula ='$noctrl'");
      if ($check_no_ctrl->rowCount() > 0) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }

      /*== Comprobando email ==*/
      if ($email != "") {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check_email = mainModel::ejecutar_consulta_simple("SELECT Correo FROM persona WHERE Correo='$email'");
            if ($check_email->rowCount() > 0) {
               $alerta = [
                  "Alerta" => "simple",
                  "Titulo" => "Ocurrio un error inesperado",
                  "Texto" => "El CORREO ya se encuentra registrado en el sistema",
                  "Tipo" => "error"
               ];
               echo json_encode($alerta);
               exit();
            }
         } else {
            $alerta = [
               "Alerta" => "simple",
               "Titulo" => "Ocurrio un error inesperado",
               "Texto" => "Ha ingresado un CORREO no válido",
               "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
         }
      } else {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "Ingrese un correo para continuar",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }


      $datos_usuario_reg = [
         "Nombre" => $nombre,
         "APaterno" => $apellido_paterno,
         "AMaterno" => $apellido_materno,
         "FechaNac" => $fecha_nac,
         "Sexo" => $sexo,
         "Correo" => $email,
         "NTelefono" => $numero_telefono,
         "Direccion" => $direccion
      ];
   }

   /* == controlador registro multiple de usuario  */
   public function registro_multU_controlador(){
      require "../library/PHPExcel/Classes/PHPExcel.php";
      $tmpfname = $_FILES['archivoexcel']['tmp_name'];
      $readexcel = PHPExcel_IOFactory::createReaderForFile($tmpfname);
      $excelobj = $readexcel->load($tmpfname);
      
      $hoja = $excelobj->getSheet(0);//leer 1ra hoja del archivo
      $filas = $hoja->getHighestRow();
       for($row=2; $row<=$filas ; $row++){ //iniciamos de la fila dos porque la 1 corresponde a la cabecera del formato
          $nom = $hoja ->getCell('A',$row)->getValue();
          $apep = $hoja ->getCell('B',$row)->getValue();
          $apem = $hoja ->getCell('C',$row)->getValue();
           /*$sex = $hoja ->getCell('D',$row)->getValue();
          $ncont = $hoja ->getCell('E',$row)->getValue();
          $esp = $hoja ->getCell('F',$row)->getValue();
          $gen = $hoja ->getCell('G',$row)->getValue();
          $email = $hoja ->getCell('H',$row)->getValue();*/
      } 

      $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
            "Tipo" => "error"
         ];
       /*return $alerta;*/
       return $filas; 



      /*
      $check_no_ctrl = mainModel::ejecutar_consulta_simple("SELECT Matricula FROM trbajador WHERE Matricula ='$noctrl'");
      if ($check_no_ctrl->rowCount() > 0) {
         $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Ocurrio un error inesperado",
            "Texto" => "El NUMERO DE CONTROL ya se encuentra registrado en el sistema",
            "Tipo" => "error"
         ];
         echo json_encode($alerta);
         exit();
      }
      */
      
   }

    /* == controlador paginador usuario  */
    public function paginador_usuario_controlador($pagina,$registros,$rol,$id,$url,$busqueda){
        $pagina=mainModel::limpiar_cadena($pagina); // recibirá la página actual donde nos encontramos
        $registros=mainModel::limpiar_cadena($registros); // cuantos registros se muestren por cada página
        $rol=mainModel::limpiar_cadena($rol);
        $id=mainModel::limpiar_cadena($id);  //id del usuario que ha iniciado sesión
        $url=mainModel::limpiar_cadena($url); // la url los enlaces de los botones,
        $url=SERVERURL.$url."/"; // toda la url
        $busqueda=mainModel::limpiar_cadena($busqueda);// busqueda para identificar si es el listado normal o es el dde búsqueda
        $tabla="";
        $pagina=(isset($pagina) && $pagina>0) ? (int) $pagina: 1; // para que no manipule el usuario  ejmp. 1.5 si no el controlador puede ddejar de funcionar
        $inicio= ($pagina>0) ?(($pagina*$registros)-$registros) : 0; // para saber desde que registro vamos a empezar a contar

        /* == búsqueda== */
        if(isset($busqueda) && $busqueda!=""){
         $consulta="SELECT SQL_CALC_FOUND_ROWS c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono FROM persona p , tutorado c  WHERE ((p.idPersona= c.Persona_idPersona) AND (c.NControl LIKE '%$busqueda%' OR p.idPersona LIKE '%$busqueda%' OR p.Nombre LIKE '%$busqueda%' OR p.APaterno LIKE '%$busqueda%' OR p.AMaterno LIKE '%$busqueda%' )) ORDER BY p.Nombre ASC LIMIT $inicio,$registros";
        }else{
            /* == listado normal== */

            $consulta="SELECT SQL_CALC_FOUND_ROWS  c.NControl,p.Nombre,p.APaterno,p.AMaterno,p.NTelefono FROM persona p , tutorado c  WHERE p.idPersona=c.Persona_idPersona ORDER BY p.Nombre ASC LIMIT $inicio,$registros";

        }


        $conexion = mainModel::conectar();

        $datos = $conexion->query($consulta);
        $datos = $datos->fetchAll();  // todos los registros de nuestra tabla de usuarios
        $total = $conexion->query("SELECT FOUND_ROWS()"); // Cuenta todos los registros de cualquiera de las 2 consultas

        $total = (int) $total->fetchColumn(); //Convertirlo a int, total registros, contar las columnas que tenemos en nuestra bd

        $Npaginas = ceil($total/$registros);// ALmacenamos el numero total de paginas que puede generar todos los registros que tenemos en nuestra tabla de la base de datos

        $tabla.='<div class="table-responsive">
		<table class="table table-dark table-sm">
			<thead>
				<tr class="text-center roboto-medium">
					<th>#</th>
					<th>NCONTROL</th>
					<th>NOMBRE</th>
					<th>APELLIDO PATERNO</th>
					<th>APELLIDO MATERNO</th>
					<th>TELEFONO</th>
					<th>ACTUALIZAR</th> 
					<th>ELIMINAR</th>
				</tr>
			</thead>
			<tbody>';
        if($total>=1 && $pagina<=$Npaginas){  // Comprobación si hay registros
            echo "hay registros";
            //global $reg_inicio;
           // global $reg_final;
            $contador=$inicio+1;
            $reg_inicio=$inicio+1;
            foreach ($datos as $rows){

                $tabla.='
                    <tr class="text-center" >
                        <td>'.$contador.'</td>
                        <td>'.$rows['NControl'].'</td>
                        <td>'.$rows['Nombre'].'</td>
                        <td>'.$rows['APaterno'].'</td>
                        <td>'.$rows['AMaterno'].'</td>
                        <td>'.$rows['NTelefono'].'</td>
                        <td>
                            <a href="#Actualizar" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>	
                            </a>
                        </td>
                        <td>
                            <form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php"  method="POST" data-form="delete" autocomplete="off">
                            
                                <button type="submit" class="btn btn-warning">
                                        <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
				    </tr>';
                $contador++;
            }
            $reg_final=$contador-1;
            // inicio tiene la posición del array , si empieza de 1 primero empezara desde cero
            // La parte cuando no hay registros
        }else{
            if($total>=1){ // recargar el listado cuando el usuario este manipulando la url, y coloque una rul que no existe
                $tabla.='<tr class="text-center" ><td colspan="9">
                <a href="'.$url.'" class="btn btn-raised btn-primary btn-sm">Haga clic aca para recargar el listado</a>                
                </td> </tr>';
            }else{
                $tabla.='<tr class="text-center" ><td colspan="9">No hay registros en el sistema</td> </tr>';
            }
        }
        $tabla.='</tbody></table></div>';

        // Mostrando total de usuarios,
        if($total>=1 && $pagina<=$Npaginas){ // Mostrará eel txt cuando estemos en una página válida

            $tabla.='<p class="text-right">Mostrando usuario '.$reg_inicio.' al '.$reg_final.' de un total de '.$total.'</p>';

        }


        if($total>=1 && $pagina<=$Npaginas){
            $tabla.=mainModel::paginador_tabla($pagina,$Npaginas,$url,5);

        }


        return $tabla;
    } /* Fin controlador */

   public function selectRegistro_selectArEs(){
      $rol=$_POST['rol'];
      if($rol=='13' || $rol=='15'){
      
      $consult_select = mainModel::ejecutar_consulta_simple("SELECT idAreas,Nombre FROM areas;");

      }else if($rol=='14'){

         $consult_select = mainModel::ejecutar_consulta_simple("SELECT idCarrera,Nombre FROM carrera;");
         

      }
      return $consult_select;
   }

   
}
