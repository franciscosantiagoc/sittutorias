<?php
   if($peticionAjax){
      require_once "../modelos/loginModel.php";
   }else{
      require_once "./modelos/loginModel.php";
   }
   class loginController extends loginModel{
      
   }