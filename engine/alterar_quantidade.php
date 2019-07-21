<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $id_carrinho = $_POST['id_carrinho'];

       $quantidade = $_POST['quantidade'];

       $alterarQuantidade = $mysqli->query('UPDATE `carrinho` SET `quantidade` = "' . $quantidade . '" WHERE `id` = "' . $id_carrinho . '"');

       $buscarCarrinho = $mysqli->query('SELECT * FROM `carrinho` WHERE `id` = "' . $id_carrinho . '"');

       $carrinho = $buscarCarrinho->fetch_object();

       $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $carrinho->produto_id);

       $produto = $buscarProduto->fetch_object();

       $preco = floatval(str_replace(',', '.', $produto->preco));

       $precoTotal = $preco * floatval($carrinho->quantidade);

       $precoTotal = strval($precoTotal);

       $precoTotal = str_replace('.', ',', $precoTotal);

       echo($precoTotal);

?>