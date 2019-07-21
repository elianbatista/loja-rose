<?php

       require_once('engine/connect.php');

       session_start();

       $id = $_GET['id'];

       $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $id);

       $produto = $buscarProduto->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title><?=$produto->nome;?> | Rose | Moda Masculina</title>

              <meta name="description" content="<?=$produto->nome;?>" />

              <meta name="keywords" content="<?=$produto->tags;?>"/>

              <meta name="robots" content="index, follow">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="container">

                     <section id="produto">

                            <div class="row">

                                   <div class="col-sm-6">

                                          <div class="case-imagem">

                                                 <img src="/admin/imagens/produtos/<?=$produto->imagem;?>" alt="<?=$produto->nome;?>">

                                          </div>

                                   </div>

                                   <div class="col-sm-6">

                                          <div class="case-info">

                                                 <div class="produto-titulo">

                                                        <?=$produto->nome;?>

                                                 </div>

                                                 <div class="produto-preco">

                                                        R$ <span class="preco"><?=$produto->preco;?></span>

                                                 </div>

                                                 <div class="informacoes">

                                                        <strong>Quantidade em Estoque: <?=$produto->quantidade_estoque;?><br/></strong>

                                                        Pagamento via <strong>boleto bancário</strong>, <strong>cartão de crédito</strong> ou <strong>cartão de débito</strong>.

                                                 </div>

                                                 <div align="center" style="border-bottom: 1px solid #cecece; padding-bottom: 20px;">

                                                        <form>

                                                               <input type="hidden" value="<?=$produto->id;?>" name="id_produto">
                                                 
                                                               <div class="field-quantidade">

                                                                      <div class="row">

                                                                             <div class="col-sm-4">

                                                                                    <span class="diminuir">

                                                                                           <i class="material-icons">remove</i>

                                                                                    </span>

                                                                             </div>

                                                                             <div class="col-sm-4">

                                                                                    <input type="number" readonly class="quantidade" id="quantidade" name="quantidade" value="1">

                                                                             </div>

                                                                             <div class="col-sm-4">

                                                                                    <span class="aumentar">

                                                                                           <i class="material-icons">add</i>

                                                                                    </span>

                                                                             </div>

                                                                      </div>

                                                               </div>

                                                               <div class="field-button">

                                                                      <?php 

                                                                      if(isset($_SESSION['id'])){

                                                                      ?>

                                                                      <input type="submit" value="Adicionar ao Carrinho" class="adicionar" id="adicionar">

                                                                      <?php

                                                                      } else {

                                                                      ?>

                                                                      <div class="button-disabled">

                                                                             Adicionar ao Carrinho

                                                                      </div>

                                                                      <div class="informacoes">

                                                                             Faça login para adicionar ao carrinho.

                                                                      </div>

                                                                      <?php

                                                                      }

                                                                      ?>

                                                               </div>

                                                        </form>

                                                 </div>

                                                 <div class="informacoes" style="padding-top: 10px;">

                                                        <strong>Frete grátis</strong> para qualquer lugar de <strong>Cachoeiro de Itapemirim</strong>.

                                                 </div>

                                          </div>

                                   </div>

                            </div>

                            <div class="descricao-produto">

                                   <?=$produto->descricao_produto?>

                            </div>

                     </section>

              </div>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     $('.diminuir').on('click', function(){

                            if($('form .quantidade').val() != 1){

                                   var quantidade = parseInt($('form .quantidade').val());

                                   quantidade -= 1;

                                   $('form .quantidade').val(quantidade);

                                   var preco = $('.produto-preco span.preco').text();

                                   preco = preco.replace(".", "");

                                   preco = preco.replace(",", ".");

                                   preco = parseFloat(preco);

                                   var precoProduto = preco/(quantidade+1);

                                   precoProduto = parseFloat(precoProduto.toFixed(2));

                                   preco = preco - precoProduto;

                                   preco = parseFloat(preco.toFixed(2));

                                   preco = preco.toString();

                                   preco = preco.replace(".", ",");

                                   $('.produto-preco span.preco').text(preco);

                            }

                     });

                     $('.aumentar').on('click',function(){

                            if($('form .quantidade').val() < <?=$produto->quantidade_estoque?>){

                                   var quantidade = parseInt($('form .quantidade').val());

                                   quantidade += 1;

                                   $('form .quantidade').val(quantidade);

                                   var preco = $('.produto-preco span.preco').text();

                                   preco = preco.replace(".", "");

                                   preco = preco.replace(",", ".");

                                   preco = parseFloat(preco);

                                   var precoProduto = preco/(quantidade-1);

                                   precoProduto = parseFloat(precoProduto.toFixed(2));

                                   preco = preco + precoProduto;

                                   preco = parseFloat(preco.toFixed(2));

                                   preco = preco.toString();

                                   preco = preco.replace(".", ",");

                                   $('.produto-preco span.preco').text(preco);

                            }

                     });
              
                     $('form').submit(function(event){

                            event.preventDefault();

                            var form = document.querySelector('form');

                            var formData = new FormData(form);

                            var button = $('form .field-button input');

                            $.ajax(

                                   {

                                          url: '/engine/adicionar_carrinho.php',

                                          type: 'post',

                                          data: formData,

                                          dataType: 'json',

                                          processData: false,  

                                          contentType: false,

                                          beforeSend: function(){

                                                 button.val('Validando...');

                                          },

                                          success: msg => {

                                                 if(msg == 1){

                                                        window.location.href = "/cliente/carrinho";

                                                 } else {

                                                        alert("Ocorreu algum erro na hora de adicionar o produto.");

                                                 }

                                          }

                                   }

                            )

                     });

              </script>
              
       </body>

</html>