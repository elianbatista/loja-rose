<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       require_once('../../../vendor/jbroadway/urlify/URLify.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Pedidos | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-listagem">

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="titulo">

                                                 Listagem de Pedidos

                                          </div>

                                          <div class="subtitulo">

                                                 Gerencie os Pedidos Cadastrados no Site

                                          </div>

                                          <div class="listagem">

                                                 <?php

                                                 $buscaPedidos = $mysqli->query('SELECT * FROM `pedidos`');

                                                 while($pedido = $buscaPedidos->fetch_object()){

                                                        $buscarCliente = $mysqli->query('SELECT * FROM `clientes` WHERE `id` = "' . $pedido->id_usuario . '"');

                                                        $cliente = $buscarCliente->fetch_object();

                                                 ?>

                                                 <a href="/admin/pedidos/visualizar/<?=$pedido->id?>">

                                                        <div class="listagem-conteudo">

                                                               <div class="row">

                                                                      <div class="col-sm-12">

                                                                             <div class="titulo"><?=$cliente->nome;?></div>

                                                                             <div class="titulo">R$ <?=$pedido->preco_total;?></div>

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

                                                                             </div>

                                                                      </div>
                                                               
                                                               </div>

                                                        </div>

                                                 </a>

                                                 <?php

                                                 }

                                                 ?>

                                          </div>

                                   </div>

                            </div>

                     </div>

              </div>

       </body>

</html>