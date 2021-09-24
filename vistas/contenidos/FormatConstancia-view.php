<?php
//if(isset($_SESSION['roll_sti'])){
//    if($_SESSION['roll_sti'] != "Admin"){
//        if($_SESSION['roll_sti'] == "Docente"){
//            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
//        }else  if($_SESSION['roll_sti'] == "Coordinador de Area"){
//            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
//        }else  if($_SESSION['roll_sti'] == "Tutorado"){
//            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
//        }else  if($_SESSION['roll_sti'] == "Coordinador de Carrera"){
//            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
//        }
//    }
//}
require_once "./vendor/autoload.php";
//require_once __DIR__ . '/vendor/autoload.php';
require_once "./controladores/formatsController.php";

$ins_format= new formatsController();
$datos_info=$ins_format->create_format_rootcoordinadoresar_controlador();

$datos_tutorado = $ins_format->obtener_datos_tutorado_controlador();
$nombre_Comp = $datos_tutorado['Nombre'].' '.$datos_tutorado['APaterno'].' '.$datos_tutorado['AMaterno'];
//var_dump($datos_tutorado);

$html = '<!DOCTYPE html>
<html>
<head>
	<title>HTML to API - Invoice</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="content-type" content="text-html; charset=utf-8">
	<link rel="stylesheet" href="./library/formats_styles/table.css">
</head>

<body>
	<header>
		<div class="div-header">
			
            <div class="left" >
				<img class="logo" width="80px" height="80px" src="./library/formats_images/logo-itistmo2.png" alt="">
			</div>
			<div class="center">
				<p class="title">Instituto Tecnológico del Istmo</p>
				<p class="sub-title">Por una tecnología propia como principio de libertad</p>

			</div>
			
			<div class="right">
				<img class="sub-logo" width="110px" height="80px" src="./library/formats_images/sep.png" alt="" >
			</div>
			
			
		</div>
	</header>
    <section>
		<div class="container">
			<div >
				<h3 class="title">ANEXO XVI. CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA</p>
				<p class="actividad" style="display:flex; width: 100%; text-align: right;">
					ACTIVIDAD COMPLEMENTARIA: TUTORIA<br><br> 
				</p>
				<p class="jefa">
					LIC. NADXIELLI KENYA MARÍN GALLEGOS<br>
					JEFA DEL DEPARTAMENTO DE SERVICIOS ESCOLARES<br>
					PRESENTE.<br><br>  
				</p>

				<p style="text-align: justify;">
					El que suscribe jefe del departamento de Sistemas y Computación, por este medio se permite hacer de su conocimiento
					que el estudiante C. '.$nombre_Comp.' con número de control '.$_SESSION['NControl_sti'].' de la carrera de '.$datos_tutorado['carrera'].' 
					ha cumplido la actividad complementaria de TUTORIA, con el Nivel de desempeño EXCELENTE y un valor numérico de 4.0 durante
					el periodo escolar '.$datos_tutorado['periodo'].'. con un valor de 2 créditos.<br><br>	 
				</p>
				<br style="text-align: justify;">
                   Se extiende la presente en la  Heroica Cd. De Juchitán de Zaragoza Oax. a los '.$datos_tutorado['fecha_lib'].'<br><br><br><br>
				</p>
				

			</div>

			';


$html .= '
			
		</div>
	</section>
	<footer>
		<div class="container">
			
			<div class="notice">
				<div class="contain">
					<img width="100px" height="60px"  class="firma" src="./library/formats_images/firma1.png">
					<p class="name">Maribel Castillejos Toledo</p>
					<p class="puesto">Cooordinador de Tutoria del área Académica</p>				
				</div>
				<div class="contain">
					<img width="100px" height="60px" class="firma" src="./library/formats_images/firma2.png">
					<p class="name">Iván Ruiz Sánchez</p>
					<p class="puesto">Jefe de Departamento de Sistemas y Computación</p>				
				</div>
				<div class="contain" style="width: 100%">
					<img width="400px" height="110px"  class="firma" src="./library/formats_images/mifirma.png">
					<p class="name">Flavio Aquiles Ruiz Celaya</p>
					<p class="puesto">Jefe del Depto. de Desarrollo Académico</p>				
				</div>
				
			</div>
			<div class="end">Documento Generado automaticamente por el sit-tutorias.</div>
		</div>
	</footer>
	</body>
	</html>';



//echo $html;
$pdf = new \Mpdf\Mpdf();
$css = file_get_contents('./library/formats_styles/table.css');
#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(-50, -50 , 10);
//Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,15);
$pdf->WriteHTML($css,1);
$pdf->WriteHTML($html);
//echo $html;

if(file_exists('Formato.pdf'))
    unlink('Formato.pdf');

$pdf->Output("Formato.pdf");
header('Location: ' . SERVERURL . 'Formato.pdf');
