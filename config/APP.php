<?php
	/*const SERVERURL="http://localhost:8081/tutorias/";

	const COMPANY="Sistema de Gestión de Tutorias";*/
	
	if( !defined( 'SERVERURL' ) ) { 
		define( 'SERVERURL', "http://localhost:8081/tutorias/" ); 
	}

	if( !defined( 'COMPANY' ) ) { 
		define( 'COMPANY', "SISTEMAS DE TUTORIAS" ); 
	}

	if( !defined( 'TIMESESSION' ) ) { 
		define( 'TIMESESSION', 60); //seg 1hr=60*60=3600
	}
	#define("SERVERURL","http://localhost:8081/tutorias/");

	#define("COMPANY","SISTEMAS DE TUTORIAS");gi

	date_default_timezone_set("America/Mexico_City");