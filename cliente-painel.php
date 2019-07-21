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

                                                 Meus Pedidos

                                          </div>

                                          <div class="row pedidos-listagem" style="border: none;">

                                                 <div class="col-sm-2">

                                                        ID

                                                 </div>

                                                 <div class="col-sm-6">

                                                        Tipo do Pagamento

                                                 </div>

                                                 <div class="col-sm-4">

                                                        Status do Pedido

                                                 </div>

                                          </div>

                                          <?php

                                          $buscarPedidos = $mysqli->query('SELECT * FROM `pedidos` WHERE `id_usuario` = "' . $_SESSION['id'] . '" ORDER BY `id` DESC');

                                          while($pedido = $buscarPedidos->fetch_object()){

                                          ?>

                                          <a href="/cliente/pedido/<?=$pedido->codigo?>">

                                                 <div class="row pedidos-listagem">

                                                        <div class="col-sm-2">

                                                               <?=$pedido->id;?>

                                                        </div>

                                                        <div class="col-sm-6">

                                                               <?php

                                                               if($pedido->tipo_transacao == 2){

                                                                      echo 'Pagamento pelo Pagseguro';

                                                               } else {

                                                                      echo 'Pagamento em Dinheiro';

                                                               }

                                                               ?>

                                                        </div>

                                                        <div class="col-sm-4">

                                                               <?php

                                                               if($pedido->status == 1){

                                                                      echo 'Aguardando Pagamento';

                                                               } else if($pedido->status == 2 && $pedido->tipo_transacao == 2){

                                                                      echo 'Pagamento Realizado';

                                                               } else if($pedido->status == 2 && $pedido->tipo_transacao == 1){

                                                                      echo 'Compra Verificado';

                                                               } else if($pedido->status == 3){

                                                                      echo 'Produto em Separação';

                                                               } else if($pedido->status == 4){

                                                                      echo 'Produto a Caminho';

                                                               } else if($pedido->status == 5){

                                                                      echo 'Produto Entregue';

                                                               }

                                                               ?>

                                                        </div>
                                                        
                                                 </div>

                                          </a>

                                          <?php

                                          }

                                          ?>

                                   </div>

                            </div>
                     
                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>
              
       </body>

</html>