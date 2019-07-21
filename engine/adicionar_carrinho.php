<?php

       use PHPMailer\PHPMailer\PHPMailer;

       use PHPMailer\PHPMailer\Exception;

       require '../vendor/autoload.php';

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $id_produto = $_POST['id_produto'];

       $quantidade = $_POST['quantidade'];

       $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = "' . $id_produto . '"');

       $produto = $buscarProduto->fetch_object();

       $buscarCarrinho = $mysqli->query('SELECT * FROM `carrinho` WHERE `produto_id` = "' . $id_produto . '"');

       if($buscarCarrinho->num_rows == 1){

              $carrinho = $buscarCarrinho->fetch_object();

              $quantidade += $carrinho->quantidade;

              $atualizarCarrinho = $mysqli->query('UPDATE `carrinho` SET `quantidade` = "' . $quantidade . '" WHERE `produto_id` = "' . $id_produto . '"');

              if($atualizarCarrinho){

                     echo 1;
                     
              } else {

                     echo 2;

              }
              
       } else {

              $adicionarCarrinho = $mysqli->query('INSERT INTO `carrinho`
              
              (

                     `produto_id`,

                     `quantidade`,

                     `cliente_id`

              )

              VALUES

              (

                     "' . $id_produto . '",

                     "' . $quantidade . '",

                     "' . $_SESSION['id'] . '"

              )

              ');

              if($adicionarCarrinho){

                     echo 1;

              } else {

                     echo 2;

              }

       }

       

?>