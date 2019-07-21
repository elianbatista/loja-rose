<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $cliente_id = $_POST['cliente_id'];

       $valor_total = $_POST['valor_total'];

       $codigo = md5(uniqid(time()));

       $criarPedido = $mysqli->query('INSERT INTO `pedidos`
       
              (

                     `id_usuario`,

                     `preco_total`,

                     `codigo`,

                     `status`

              )

              VALUES

              (

                     "' . $cliente_id . '",

                     "' . $valor_total . '",

                     "' . $codigo . '",

                     "0"

              )

       ');

       $id_pedido = $mysqli->insert_id;

       $buscarCarrinho = $mysqli->query('SELECT * FROM `carrinho` WHERE `cliente_id` = "' . $cliente_id . '"');

       while($carrinho = $buscarCarrinho->fetch_object()){

              $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = "' . $carrinho->produto_id . '"');

              $produto = $buscarProduto->fetch_object();

              if($carrinho->quantidade > $produto->quantidade_estoque){

                     echo 3;

                     exit();

              } else {

                     $quantidade = intval($produto->quantidade_estoque) - intval($carrinho->quantidade);

                     $quantidade = strval($quantidade);

              }

              $preco = $produto->preco;

              $preco = str_replace(',', '.', $preco);

              $preco = floatval($preco);

              $preco = $preco * $carrinho->quantidade;

              $preco = strval($preco);

              $preco = str_replace('.', ',', $preco);

              $criarCompra = $mysqli->query('INSERT INTO `compras`
              
                     (

                            `id_pedido`,

                            `id_produto`,

                            `quantidade`,

                            `preco`

                     )

                     VALUES

                     (

                            ' . $id_pedido . ',

                            ' . $carrinho->produto_id . ',

                            ' . $carrinho->quantidade . ',

                            "' . $preco . '"
                            
                     )

              ');

              $alterarQuantidadeEstoque = $mysqli->query('UPDATE `produtos` SET `quantidade_estoque` = "' . $quantidade . '"  WHERE `id` = "' . $carrinho->produto_id . '"');

       }

       $limparCarrinho = $mysqli->query('DELETE FROM `carrinho` WHERE `cliente_id` = "' . $cliente_id . '"');

       if($limparCarrinho){

              echo $codigo;

       } else {

              echo 2;

       }

?>