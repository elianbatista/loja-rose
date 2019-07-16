<?php

       require_once('../../engine/connect.php');

       $email = addslashes(trim($_POST['email']));

       $senha = addslashes(trim(md5(sha1($_POST['senha']))));

       $buscaUsuario = $mysqli->query('SELECT * FROM `usuarios` WHERE `email` = "' . $email . '" AND `senha` = "' . $senha . '"');

       $usuario = $buscaUsuario->fetch_object();

       if($buscaUsuario->num_rows == 0){

              echo 1;

       } else {

              session_start();

              $_SESSION['id'] = $usuario->id;

              $_SESSION['email'] = $usuario->email;

              echo 2;

       }

?>