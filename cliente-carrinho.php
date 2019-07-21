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

                            Carrinho

                     </div>

              </div>

              <section id="carrinho">

                     <div class="container">

                            <div class="buttons">

                                   <a href="/">

                                          <div class="button-carrinho">

                                                 <i class="material-icons">keyboard_arrow_left</i>

                                                 <span>

                                                        Continuar Comprando

                                                 </span>

                                          </div>

                                   </a>

                                   <div class="limpar-carrinho none">

                                          <i class="material-icons">clear</i>

                                          <span>

                                                 Limpar Carrinho

                                          </span>

                                   </div>

                            </div>

                            <div class="carrinhos">

                                   <div class="carrinho-title">

                                          Produtos Adicionados ao Carrinho

                                   </div>

                                   <div class="carrinho-listagem">

                                          <?php

                                          $buscarCarrinho = $mysqli->query('SELECT * FROM `carrinho` WHERE `cliente_id` = ' . $_SESSION['id']);

                                          while($carrinho = $buscarCarrinho->fetch_object()){

                                                 $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $carrinho->produto_id);

                                                 $produto = $buscarProduto->fetch_object();

                                                 $preco = str_replace('.', '', $produto->preco);

                                                 $preco = str_replace(',', '.', $preco);

                                                 $preco = floatval($preco);

                                                 $preco *= $carrinho->quantidade;

                                                 $preco = str_replace('.', ',', $preco);

                                          ?>

                                          <div class="carrinho-produto" id="<?=$carrinho->id;?>">

                                                 <div class="row">

                                                        <div class="col-sm-1">

                                                               <img src="/admin/imagens/produtos/<?=$produto->imagem;?>" alt="<?=$produto->nome;?>">

                                                        </div>

                                                        <div class="col-sm-4" style="display: flex; align-items: center;">

                                                               <div class="info-title"><?=$produto->nome;?></div>

                                                        </div>

                                                        <div class="col-sm-3" style="display: flex; align-items: center;">

                                                               <form class="alterar_quantidade" id="<?=$carrinho->id;?>">

                                                                      <input type="hidden" name="id_carrinho" class="id_carrinho" value="<?=$carrinho->id;?>">

                                                                      <div class="produto-quantidade">

                                                                             <div class="remove-quantidade" id="<?=$carrinho->id;?>">-</div>
                                                               
                                                                             <input type="text" readonly value="<?=$carrinho->quantidade;?>" class="quantidade" id="<?=$carrinho->id;?>" name="quantidade">

                                                                             <div class="add-quantidade" id="<?=$carrinho->id;?>">+</div>

                                                                      </div>

                                                               </form>

                                                        </div>

                                                        <div class="col-sm-3" style="display: flex; align-items: center;">

                                                               <div class="produto-preco"><?=$preco;?></div>

                                                        </div>

                                                        <div class="col-sm-1" style="display: flex; align-items: center;">

                                                               <form class="remover_produto" id="<?=$carrinho->id;?>">

                                                                      <input type="hidden" name="id_carrinho" class="id_carrinho" value="<?=$carrinho->id;?>">

                                                                      <div class="button-excluir" id="<?=$carrinho->id;?>">

                                                                             <i class="material-icons">clear</i>

                                                                      </div>

                                                               </form>

                                                        </div>

                                                 </div>

                                          </div>

                                          <?php

                                          }
                                          
                                          ?>

                                          <div class="carrinho-listagem none" id="sem-produto" align="center">

                                                 <i class="material-icons">add_shopping_cart</i>
                                          
                                                 Não há nenhum produto em seu carrinho.<br/>Faça suas compras agora :D

                                          </div>

                                   </div>

                            </div>

                            <div class="bottom-buttons">

                                   <div class="preco-total">

                                          Total: R$ 588,55

                                   </div>

                                   <div class="pagar-local none">

                                          <i class="material-icons">attach_money</i>

                                          <span>Finalizar Compra</span>

                                   </div>

                            </div>

                            <form class="finalizar-compra">

                                   <input type="hidden" class="total" name="total">

                            </form>

                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     function calculaPrecoTotal(){

                            var precos = $('.produto-preco');

                            var precoTotal = 0;

                            $(precos).each(function(index, element){

                                   if(!$(element).is(':hidden')){

                                          var valor = $(element).text().replace(',', '.');

                                          precoTotal += parseFloat(valor);

                                   }

                            });

                            precoTotal = precoTotal.toString();

                            precoTotal = precoTotal.replace('.', ',');

                            $('.preco-total').text('Total: R$ ' + precoTotal);

                            $('form.finalizar-compra .total').val(precoTotal);

                     }

                     calculaPrecoTotal();

                     $(document).ready(function(){

                            var carrinhos = $('.carrinho-produto');

                            if(carrinhos.length == 0){

                                   $('#sem-produto').show();

                                   $('.limpar-carrinho').hide();

                                   $('.pagar-local').hide();

                            } else {

                                   $('.limpar-carrinho').show();

                                   $('.pagar-local').show();

                            }

                            $('.remove-quantidade').on('click', function(){

                                   var id = $(this).attr('id');

                                   var forms = $('form.alterar_quantidade');

                                   $(forms).each(function(index, element){
                                          
                                          if($(element).attr('id') == id){

                                                 var quantidade = $(element).find('input.quantidade').val();

                                                 if(quantidade != 1){

                                                        quantidade = parseFloat(quantidade);

                                                        quantidade -= 1;

                                                        $(element).find('input.quantidade').val(quantidade);

                                                        $(element).submit();

                                                 }

                                          }

                                   });

                            });

                            $('.add-quantidade').on('click', function(){

                                   var id = $(this).attr('id');

                                   var forms = $('form.alterar_quantidade');

                                   $(forms).each(function(index, element){
                                          
                                          if($(element).attr('id') == id){

                                                 var quantidade = $(element).find('input.quantidade').val();

                                                 quantidade = parseFloat(quantidade);

                                                 quantidade += 1;

                                                 $(element).find('input.quantidade').val(quantidade);

                                                 $(element).submit();

                                          }

                                   });

                            });

                            $('.remover_produto .button-excluir').on('click', function(){

                                   var id = $(this).attr('id');

                                   var forms = $('form.remover_produto');

                                   $(forms).each(function(index, element){

                                          if($(element).attr('id') == id){

                                                 $(element).submit();

                                          }

                                   });

                            });

                            $('form.alterar_quantidade').submit(function(event){

                                   event.preventDefault();

                                   var id_carrinho = $(this).find('.id_carrinho').val();

                                   var quantidade = $(this).find('.quantidade').val();

                                   $.ajax(

                                          {

                                                 url: '/engine/alterar_quantidade.php',

                                                 type: 'post',

                                                 data: {

                                                        id_carrinho: id_carrinho,

                                                        quantidade: quantidade

                                                 },

                                                 success: preco => {

                                                        var produtos = document.querySelectorAll(".carrinho-produto");

                                                        produtos.forEach(element => {
                                                               
                                                               if(element.querySelector('.id_carrinho').value == id_carrinho){

                                                                      element.querySelector('.produto-preco').innerHTML = preco;

                                                               }

                                                        });

                                                        calculaPrecoTotal();

                                                 }

                                          }

                                   )

                            });

                            $('.pagar-local').on('click', function(){

                                   $('form.finalizar-compra').submit();

                            });

                            $('form.remover_produto').submit(function(event){

                                   event.preventDefault();

                                   var id_carrinho = $(this).find('.id_carrinho').val();

                                   $.ajax(

                                          {

                                                 url: '/engine/remover_do_carrinho.php',

                                                 type: 'post',

                                                 data: {

                                                        id_carrinho: id_carrinho

                                                 },

                                                 success: id => {

                                                        var carrinhos = $('.carrinho-produto');

                                                        $(carrinhos).each(function(index, element){

                                                               if($(element).attr('id') == id){

                                                                      $(element).hide();

                                                               }

                                                        });

                                                        calculaPrecoTotal();

                                                        var cont = 0;

                                                        $(carrinhos).each(function(index, element){

                                                               if($(element).is(':hidden')){

                                                                      cont++;

                                                               }

                                                        });

                                                        if(carrinhos.length == cont){

                                                               $('#sem-produto').show();

                                                               $('.limpar-carrinho').hide();

                                                               $('.pagar-local').hide();

                                                        } else {

                                                               $('.pagar-local').show();

                                                        }

                                                 }

                                          }

                                   )

                            });

                            $('.limpar-carrinho').on('click', function(){

                                   $.ajax(

                                          {

                                                 url: '/engine/limpar_carrinho.php',

                                                 type: 'post',

                                                 data: {

                                                        cliente_id: <?=$_SESSION['id'];?>

                                                 },

                                                 success: preco => {

                                                        var carrinhos = $('.carrinho-produto');

                                                        $(carrinhos).each(function(index, element){

                                                               $(element).hide();

                                                        });

                                                        $('#sem-produto').show();

                                                        $('.limpar-carrinho').hide();

                                                 }

                                          }

                                   )

                            });

                            $('form.finalizar-compra').submit(function(event){

                                   event.preventDefault();

                                   var total = $('form.finalizar-compra .total').val();

                                   $.ajax(

                                          {

                                                 url: '/engine/finalizar_compra.php',

                                                 type: 'post',

                                                 data: {

                                                        cliente_id: <?=$_SESSION['id'];?>,

                                                        valor_total: total

                                                 },

                                                 success: msg => {

                                                        if(msg == 2){

                                                               alert('Ocorreu um erro ao finalizar a compra tente novamente mais tarde.');

                                                        } else if(msg == 3){
                                                               
                                                               alert("Algum produto está em falta em nosso estoque, pedimos desculpas");
                                                               
                                                        } else {

                                                               window.location.href = '/cliente/finalizar-compra/' + msg;

                                                        }

                                                 }

                                          }

                                   ) 
                                   
                            });

                     });

              </script>
              
       </body>

</html>