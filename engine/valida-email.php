<?php

       require_once('connect.php');

       $email = $_POST['email'];

       $buscarEmail = $mysqli->query('SELECT * FROM `clientes` WHERE `email` = "' . $email . '"');

       if($buscarEmail->num_rows == 0){

              echo 1;
              
       } else {

              echo 2;

       }

?>