<?php

    require_once "./vendor/autoload.php";
    //require_once __DIR__ . '/vendor/autoload.php';
    require_once "./controladores/formatsController.php";

    $ins_format= new formatsController();
    $datos_info=$ins_format->create_format_tutortutorados_controlador();

    $consulta_tutorados=$datos_info["tutorados"];
    $consulta_actividades=$datos_info["actividades"];
    $datos=$datos_info["datos"];

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
				<p class="date" style="display:flex; width: 100%; text-align: right;">
					                           Heroica Cd. De Juchitán de Zaragoza Oax. a 15 de Agostro de 2021
				</p>
				<p class="tutor">
					Tutor: Ranulfo Rivera Castillo
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
						<th class="unit">NControl</th>
						<th class="unit">Especialidad</th>
						<th class="unit">Generación</th>
					</tr>
				</thead>
				<tbody>';
$total = count($consulta_tutorados);
for($i=0; $i<$total;$i++) {
    $html .= '<tr>
						<td class="unit">'.($i+1).'</td>
						<td class="unit">'.$consulta_tutorados[$i][0].'</td>
						<td class="unit">'.$consulta_tutorados[$i][1].'</td>
						<td class="unit">'.$consulta_tutorados[$i][2].'</td>
						<td class="unit">'.$consulta_tutorados[$i][3].'</td>
					</tr>';
}
$html .='</tbody>
			</table>
            <div class="details-activitys">
				<p class="title">Actividades</p>
				
				<p class="activity-desc">
					Actividades del plan de acción tutorial a realizarse:
				</p>';
$total_AC = count($consulta_actividades);
for($i=0; $i<$total_AC;$i++) {
    $html .= '<p class="activity">
					'.($i+1).'. '. $consulta_actividades[$i][0].'
				</p>';
}

$html .='<p class="activity-descf">
					Reporte Semestral que integren las actividades ya descritas
				</p>
				

			</div>
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
	</footer>';
//include "./vendor/mpdf/mpdf/src/Mpdf.php";
//$pdf = new mPDF();
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
    //echo '<script>alert("archivo eliminado");</script>';
    $pdf->Output("Formato.pdf");
    header('Location: ' . SERVERURL . 'Formato.pdf');
