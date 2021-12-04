<?php
const SERVER="localhost";
//const DB="sistutorias";
const DB="prueba";
const USER="root";
const PASS="";


    const SGBD="mysql:host=".SERVER.";dbname=".DB;
    if( !defined( 'TIMESESSION' ) ) { 
		define( 'TIMESESSION', 900); //seg 1hr=60*60=3600
	}
    if( !defined( 'DBNAME' ) ) { 
		define( 'DBNAME', DB); //seg 1hr=60*60=3600
	}

    const METHOD="AES-256-CBC";
    const SKEY='$SITDEMOTUTORIAS@2021';
    const SIV='349641';


?>
