<?php
const SERVER="localhost";
const DB="sistutorias";
const USER="root";
const PASS="";
/*
const SERR="localhost";
const DB="u760563657_sistutorias";
const USER="u760563657_sit_tutorias";
const PASS="sistemaTutorias21";
*/

    const SGBD="mysql:host=".SERVER.";dbname=".DB;
    if( !defined( 'TIMESESSION' ) ) { 
		define( 'TIMESESSION', 900); //seg 1hr=60*60=3600
	}
    if( !defined( 'DBNAME' ) ) { 
		define( 'DBNAME', DB); //seg 1hr=60*60=3600
	}

    const METHOD="AES-256-CBC";
    const SKEY='$SISTUTORIAS@ITISTMO2020';
    const SIV='349641';


?>