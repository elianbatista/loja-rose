<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $id_carrinho = $_POST['id_carrinho'];

       $removerCarrinho = $mysqli->query('DELETE FROM `carrinho` WHERE `id` = "' . $id_carrinho . '"');

       if($removerCarrinho){

              echo $id_carrinho;

       }

?>