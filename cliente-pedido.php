<?php

       require_once('engine/connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');
              
       } else {

              if($_SESSION['tipo'] != 'Cliente'){

                     header('Location: /cliente/login');

              }

       }

       $codigo = $_GET['codigo'];

       $buscarPedido = $mysqli->query('SELECT * FROM `pedidos` WHERE `codigo` = "' . $codigo . '" AND `id_usuario` = "' . $_SESSION['id'] . '"');

       $pedido = $buscarPedido->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title>Painel do Cliente | Rose | Moda Masculina</title>

              <meta name="description" content="Compre já as melhores roupas da moda masculina atual, entregamos para todos lugares de Cachoeiro de Itapemirim sem valor de entrega." />

              <meta name="keywords" content="roupas, masculinas, moda, masculina, entrega, grátis, cachoeiro de itapemirim, cachoeiro"/>

              <meta name="robots" content="index, follow">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="intern-title">

                     <div class="container">

                            Painel do Cliente

                     </div>

              </div>

              <section id="painel-cliente">

                     <div class="container">

                            <div class="row">

                                   <div class="col-sm-4">

                                          <div class="menu-painel">

                                                 <ul>

                                                        <a href="/cliente">

                                                               <li class="activated">

                                                                      Meus Pedidos

                                                               </li>

                                                        </a>

                                                        <a href="/cliente/dados">

                                                               <li>

                                                                      Meus Dados

                                                               </li>

                                                        </a>

                                                        <a href="/cliente/logout">

                                                               <li>

                                                                      Sair

                                                               </li>

                                                        </a>

                                                 </ul>

                                          </div>

                                   </div>

                                   <div class="col-sm-8">

                                          <div class="painel-title" style="text-align: left;">

                                                 Visualizar Pedido - nº <?=$pedido->id;?>

                                          </div>

                                          <div class="pedidos-listagem row" style="border: none;">

                                                 <div class="col-sm-1"></div>

                                                 <div class="col-sm-5">Produto: </div>

                                                 <div class="col-sm-3">Quantidade: </div>

                                                 <div class="col-sm-3">Valor Total: </div>

                                          </div>

                                          <?php

                                          $buscarCompras = $mysqli->query('SELECT * FROM `compras` WHERE `id_pedido` = "' . $pedido->id . '"');

                                          while($compra = $buscarCompras->fetch_object()){

                                          $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = "' . $compra->id_produto . '"');

                                          $produto = $buscarProduto->fetch_object();

                                          ?>

                                          <div class="pedidos-listagem row">

                                                 <div class="col-sm-1">

                                                        <img src="/admin/imagens/produtos/<?=$produto->imagem;?>" alt="<?=$produto->nome;?>">

                                                 </div>

                                                 <div class="col-sm-5">

                                                        <?=$produto->nome;?>

                                                 </div>

                                                 <div class="col-sm-3">

                                                        <?=$compra->quantidade;?>

                                                 </div>

                                                 <div class="col-sm-3">
                                                        
                                                        <?=$compra->preco;?>

                                                 </div>

                                          </div>

                                          <?php

                                          }

                                          ?>

                                          <?php

                                          if($pedido->status == 1){

                                          ?>

                                          <div class="button-realizar-compra">

                                                 <a href="/cliente/finalizar-compra/<?=$pedido->codigo?>">

                                                        Realizar Pagamento

                                                 </a>

                                          </div>

                                          <?php

                                          }

                                          ?>

                                          <div class="valor-total">

                                                 Valor Total: <span>R$ <?=$pedido->preco_total;?></span>

                                          </div>

                                   </div>

                            </div>
                     
                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>
              
       </body>

</html>