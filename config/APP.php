<?php
	/*const SERVERURL="http://localhost:8081/tutorias/";

	const COMPANY="Sistema de Gestión de Tutorias";*/
	
	if( !defined( 'SERVERURL' ) ) { 
		define( 'SERVERURL', "http://localhost:8081/tutorias/" ); 
	}

	if( !defined( 'COMPANY' ) ) { 
		define( 'COMPANY', "SISTEMAS DE TUTORIAS" ); 
	}
	#define("SERVERURL","http://localhost:8081/tutorias/");

	#define("COMPANY","SISTEMAS DE TUTORIAS");

	date_default_timezone_set("America/Mexico_City");