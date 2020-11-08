<?php
require_once "../../config/APP.php";
session_start(['name'=>'STI']);
session_unset();
session_destroy();
//header("Location:../home.php");
    /* if(headers_sent()){ */
echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'";</script>';

?>