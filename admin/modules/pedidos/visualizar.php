<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $id = $_GET['id'];

       $buscarPedido = $mysqli->query('SELECT * FROM `pedidos` WHERE `id` = ' . $id);

       $pedido = $buscarPedido->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Editar Produto | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-editar">

                            <div class="titulo">

                                   Visualizar Pedido

                            </div>

                            <div class="status">

                                   <?php

                                          switch($pedido->status) {

                                                 case 0:
                                                        echo 'Pagamento não Realizado';
                                                        break;

                                                 case 1:
                                                        echo 'Aguardando Pagamento';
                                                        break;

                                                 case 2:
                                                        if($pedido->tipo_transacao == 2){

                                                               echo 'Pagamento Realizado via Pagseguro';

                                                        } else {

                                                               echo 'Pagamento em dinheiro na entrega';

                                                        }

                                                        break;

                                                 case 3:
                                                        echo 'Produto em Separação';
                                                        break;

                                                 case 4:
                                                        echo 'Produto a Caminho';
                                                        break;

                                                 case 5:
                                                        echo 'Produto Entregue';
                                                        break;
                                                                     
                                          }

                                   ?>

                                   <br/>

                                   <div class="button">

                                          Alterar Status do Pedido

                                   </div>

                            </div>

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="produtos-listagem">

                                                 <?php

                                                 $buscaCompra = $mysqli->query('SELECT * FROM `compras` WHERE `id_pedido` = ' . $id);

                                                 while($compra = $buscaCompra->fetch_object()){

                                                        $buscaProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = "' . $compra->id_produto . '"');

                                                        $produto = $buscaProduto->fetch_object();

                                                 ?>

                                                 <div class="listagem-conteudo">

                                                        <div class="row">

                                                               <div class="col-sm-1">

                                                                      <img src="/admin/imagens/produtos/<?=$produto->imagem?>" alt="">

                                                               </div>

                                                               <div class="col-sm-10">

                                                                      <div class="produto-listagem-titulo"><?=$produto->nome;?></div>

                                                                      <div class="produto-listagem-titulo">Quantidade: <?=$compra->quantidade;?></div>

                                                               </div>
                                                        
                                                        </div>

                                                 </div>

                                                 <?php

                                                 }

                                                 ?>

                                          </div>

                                   </div>

                            </div>

                     </div>

              </div>

              <?php include('../../../includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            $('.status .button').on('click', function(){

                                   if(<?=$pedido->status;?> >= 2 && <?=$pedido->tipo_transacao;?> == 2 && <?=$pedido->status?> < 5){

                                          $.ajax(

                                                 {

                                                        url: '/admin/modules/pedidos/engine.php',

                                                        type: 'post',

                                                        data: {

                                                               pedido: <?=$id?>,

                                                               status: <?=$pedido->status?>

                                                        },

                                                 }

                                          ).done(function(msg){

                                                 $('.button-submit-label .loader').addClass('none');

                                                 $('.button-submit-label i').removeClass('none');

                                                 window.location.href = "/admin/pedidos/visualizar/" + msg;

                                          });

                                   }

                            });

                     });

              </script>

       </body>

</html>