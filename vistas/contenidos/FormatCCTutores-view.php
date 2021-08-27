<?php
if(isset($_SESSION['roll_sti'])){
    //if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
    if($_SESSION['roll_sti'] == "Docente"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
    }else    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }else  if($_SESSION['roll_sti'] == "Admin"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
    }

}
require_once "./vendor/autoload.php";
//require_once __DIR__ . '/vendor/autoload.php';
require_once "./controladores/formatsController.php";

$ins_format= new formatsController();
$datos_info=$ins_format->create_format_cctutores_controlador();

$consulta_tutoracti=$datos_info["tutores"];

$datos=$datos_info["datos"];

$estado ='';
if($_POST['tutores']=='1'){
    $estado='activos';

}elseif ($_POST['tutores'] == '0'){
    $estado = 'inactivos';

}
$total = count($consulta_tutoracti);

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
				<p class="title-desc">Asignación de Tutorados para el PIT</p>

			</div>
			
			<div class="right">
				<img class="sub-logo" width="110px" height="80px" src="./library/formats_images/sep.png" alt="" >
			</div>
			
			
		</div>
	</header>
    <section>
		<div class="container">
			<div class="details">
				<p class="title">ASIGNACIÓN DE TUTORIAS</p>
				<p class="date">
					Heroica Cd. De Juchitán de Zaragoza Oax. a  '.$datos[1].'
				</p>
				<p class="tutor">
					Coordinador: '.$datos[0].'
				</p>
				
				<p class="list">
					Lista de tutorados
				</p>
				

			</div>

			<table border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="qty">No.</th>
						<th class="desc">Nombre</th>
						<th class="unit">Matricula</th>
						<th class="unit">Area</th>
						
					</tr>
				</thead>
				<tbody>';

for($i=0; $i<$total;$i++) {

    $html .='<tr>
        <td class="qty">'.($i+1).'</td>
        <td class="desc">'.$consulta_tutoracti[$i][0].'</td>
        <td class="unit">'.$consulta_tutoracti[$i][1].'</td>
        <td class="unit">'.$consulta_tutoracti[$i][2].'</td>
    </tr>
    ';



}
$html .= '</tbody>
			</table>
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
				
			</div>
			<div class="end">Documento Generado automaticamente por el sit-tutorias.</div>
		</div>
	</footer>
	</body>
	</html>';




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
