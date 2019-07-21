<?php

       require_once('connect.php');

       session_start();

       $email = addslashes(trim($_POST['email']));

       $senha = addslashes(trim(md5(sha1($_POST['senha']))));

       $buscarCliente = $mysqli->query('SELECT * FROM `clientes` WHERE `email` = "' . $email . '" AND `senha` = "' . $senha . '"');

       if($buscarCliente->num_rows == 1){

              $cliente = $buscarCliente->fetch_object();

              $_SESSION['id'] = $cliente->id;

              $_SESSION['tipo'] = "Cliente";

              $_SESSION['nome'] = $cliente->nome;

              echo 1;

       } else {

              echo 2;

       }

?>