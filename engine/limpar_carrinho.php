<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $cliente_id = $_POST['cliente_id'];

       $limparCarrinho = $mysqli->query('DELETE FROM `carrinho` WHERE `cliente_id` = "' . $cliente_id . '"');

       if($limparCarrinho){

              echo 1;

       } else {

              echo 2;

       }

?>