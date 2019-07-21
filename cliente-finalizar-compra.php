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

       $buscarPedido = $mysqli->query('SELECT * FROM `pedidos` WHERE `codigo` = "' . $codigo . '"');

       $pedido = $buscarPedido->fetch_object();
       
?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title>Finalizar Compra | Rose | Moda Masculina</title>

              <meta name="description" content="Compre já as melhores roupas da moda masculina atual, entregamos para todos lugares de Cachoeiro de Itapemirim sem valor de entrega." />

              <meta name="keywords" content="roupas, masculinas, moda, masculina, entrega, grátis, cachoeiro de itapemirim, cachoeiro"/>

              <meta name="robots" content="index, follow">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="intern-title">

                     <div class="container">

                            Finalizar Compra

                     </div>

              </div>

              <section id="finalizar-compra">

                     <div class="container">

                            <div class="row">

                                   <div class="col-sm-6">

                                          <div class="area-title">

                                                 Observações:

                                          </div>

                                          <textarea name="observacao" id="observacao" cols="30" rows="8" placeholder="Digite aqui alguma observação para sua compra, como por exemplo horário preferido para entrega."></textarea>

                                   </div>

                                   <div class="col-sm-6">

                                          <div class="area-title">

                                                 Resumo da Compra:

                                          </div>

                                          <div class="resumo">

                                                 <strong>Frete:</strong> Grátis para toda região de <strong>Cachoeiro de Itapemirim</strong>, veja nossa política de entrega.<br/>

                                                 <strong style="color: red;">Atenção</strong>, só será entregue pedidos para <strong>Cachoeiro de Itapemirim</strong>, qualquer pedido
                                                 que seja feito de outro lugar será cancelado.<br/>

                                                 O Pedido será entregue no seu endereço de cadastro da sua conta seguindo as observações listadas ao lado. <br/><br/>

                                                 <div class="total">

                                                        Total do Pedido: <span>R$ <?=$pedido->preco_total;?></span>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="buttons">

                                          <div class="button-pagamento" id="dinheiro">

                                                 Pagar no Local em Dinheiro

                                          </div>

                                          <div class="button-pagamento" id="pagseguro">

                                                 Pagar com PagSeguro

                                          </div>

                                   </div>

                            </div>

                     </div>
              
              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

              <script>

                     $('.button-pagamento').on('click', function(){

                            var observacao = $('textarea#observacao').text();

                            if($(this).attr('id') == 'dinheiro'){

                                   $.ajax(

                                          {

                                                 url: '/engine/finalizar_pedido.php',

                                                 type: 'post',

                                                 data: {

                                                        codigo: <?=$pedido->id;?>,

                                                        observacao: observacao,

                                                        tipo_transacao: 1

                                                 },

                                                 success: msg => {

                                                        if(msg == 1){

                                                               alert('Pedido realizado com sucesso, em até 1 dia útil realizaremos a entrega.');

                                                        }

                                                 }

                                          }

                                   )

                            } else if($(this).attr('id') == 'pagseguro'){

                                   $.ajax(

                                          {

                                                 url: '/engine/finalizar_pedido.php',

                                                 type: 'post',

                                                 data: {

                                                        codigo: <?=$pedido->id;?>,

                                                        observacao: observacao,

                                                        tipo_transacao: 2

                                                 },

                                                 success: code => {

                                                        //Insira o código de checkout gerado no Passo 1
                                                        var callback = {
                                                        success : function(transactionCode) {
                                                               //Insira os comandos para quando o usuário finalizar o pagamento. 
                                                               //O código da transação estará na variável "transactionCode"
                                                               $.ajax(

                                                                      {

                                                                             url: '/engine/pagamento_realizado.php',

                                                                             type: 'post',

                                                                             data: {

                                                                                    codigo: <?=$pedido->id;?>,

                                                                                    id_transacao: transactionCode

                                                                             },

                                                                             success: msg => {

                                                                                    if(msg == 1){

                                                                                           alert('Pedido realizado com sucesso, em até 1 dia útil realizaremos a entrega.');

                                                                                           window.location.href = "/cliente";

                                                                                    }

                                                                             }

                                                                      }

                                                               )

                                                        },
                                                        abort : function() {
                                                               //Insira os comandos para quando o usuário abandonar a tela de pagamento.
                                                               window.location.href = '/cliente';
                                                        }
                                                        };
                                                        //Chamada do lightbox passando o código de checkout e os comandos para o callback
                                                        var isOpenLightbox = PagSeguroLightbox(code, callback);
                                                        // Redireciona o comprador, caso o navegador não tenha suporte ao Lightbox
                                                        if (!isOpenLightbox){
                                                               location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" + code;
                                                        }

                                                 }

                                          }

                                   )

                            }

                     });

              </script>
              
       </body>

</html>