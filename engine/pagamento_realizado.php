<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $id_pedido = $_POST['codigo'];

       $id_transacao = $_POST['id_transacao'];

       $alterarPedido = $mysqli->query('UPDATE `pedidos` SET
       
              `id_transacao` = "' . $id_transacao . '",

              `status` = "2"
              
              WHERE `id` = "' . $id_pedido . '"

       ');

       if($alterarPedido){

              echo 1;

       } else {

              echo 2;

       }

?>