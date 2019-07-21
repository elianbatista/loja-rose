<?php

       require_once('engine/connect.php');

       session_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title>Cadastro de Cliente | Rose | Moda Masculina</title>

              <meta name="description" content="Compre já as melhores roupas da moda masculina atual, entregamos para todos lugares de Cachoeiro de Itapemirim sem valor de entrega." />

              <meta name="keywords" content="roupas, masculinas, moda, masculina, entrega, grátis, cachoeiro de itapemirim, cachoeiro"/>

              <meta name="robots" content="index, follow">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="intern-title">

                     <div class="container">

                            Faça seu Cadastro

                     </div>

              </div>

              <section id="painel-cliente">

                     <div class="container">

                            <form class="registrar registrar-cliente" style="width: 100%;">

                                   <div class="row">

                                          <div class="col-sm-12">

                                                 <div class="field-checkbox">

                                                        <input type="radio" id="fisica" class="pessoa" name="pessoa" value="fisica" checked required>

                                                        <label for="fisica">Pessoa Física </label>

                                                        <input type="radio" id="juridica" class="pessoa" name="pessoa" value="juridica" required>

                                                        <label for="juridica">Pessoa Jurídica </label>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="pessoa-fisica">

                                          <div class="row">

                                                 <div class="col-sm-8">

                                                        <div class="field-input">

                                                               <label for="email">Nome Completo:</label>

                                                               <input type="text" name="nome" class="nome">

                                                        </div>

                                                 </div>

                                                 <div class="col-sm-4">

                                                        <div class="field-input">

                                                               <label for="email">CPF:</label>

                                                               <input type="text" name="cpf" class="cpf" placeholder="___.___.___-__">

                                                        </div>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="pessoa-juridica none">

                                          <div class="row">

                                                 <div class="col-sm-5">

                                                        <div class="field-input">

                                                               <label for="email">Razão Social:</label>

                                                               <input type="text" name="razao_social" class="razao_social">

                                                        </div>

                                                 </div>

                                                 <div class="col-sm-5">

                                                        <div class="field-input">

                                                               <label for="email">Inscrição Estadual:</label>

                                                               <input type="text" name="inscricao_estadual" class="inscricao_estadual">

                                                        </div>

                                                 </div>

                                                 <div class="col-sm-2">

                                                        <div class="field-input">

                                                               <label for="email">CNPJ:</label>

                                                               <input type="text" name="cnpj" class="cnpj" placeholder="__.___.___/____-__">

                                                        </div>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="email">Telefone:</label>

                                                        <input type="text" name="telefone" class="telefone" placeholder="(__) ____-____" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="email">Telefone Secundário:</label>

                                                        <input type="text" name="telefone2" class="telefone2" placeholder="(__) ____-____" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="email">Data de Nascimento:</label>

                                                        <input type="text" name="data_nascimento" class="data_nascimento" placeholder="__/__/____" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-6">

                                                 <div class="field-input">

                                                        <label for="email">Email:</label>

                                                        <input type="email" name="email" class="email" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-6">

                                                 <div class="field-input">

                                                        <label for="senha">Senha:</label>

                                                        <input type="password" name="senha" class="senha" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="senha">CEP:</label>

                                                        <input type="text" name="cep" class="cep" placeholder="_____-___" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-5">

                                                 <div class="field-input">

                                                        <label for="senha">Rua:</label>

                                                        <input type="text" name="rua" class="rua" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-3">

                                                 <div class="field-input">

                                                        <label for="senha">Número:</label>

                                                        <input type="text" name="numero" class="numero" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-5">

                                                 <div class="field-input">

                                                        <label for="senha">Bairro:</label>

                                                        <input type="text" name="bairro" class="bairro" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-2">

                                                 <div class="field-input">

                                                        <label for="senha">Estado:</label>

                                                        <select name="estado" class="estado" required>

                                                               <option value="ES">ES</option>

                                                        </select>

                                                 </div>

                                          </div>

                                          <div class="col-sm-5">

                                                 <div class="field-input">

                                                        <label for="senha">Cidade:</label>

                                                        <select name="cidade" class="cidade" required>

                                                               <option value="Cachoeiro de Itapemirim">Cachoeiro de Itapemirim</option>

                                                        </select>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-6">

                                                 <div class="field-input">

                                                        <label for="senha">Complemento:</label>

                                                        <input type="text" name="complemento" class="complemento" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-6">

                                                 <div class="field-input">

                                                        <label for="senha">Ponto de Referência:</label>

                                                        <input type="text" name="referencia" class="referencia" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="aviso">

                                          <span>No momento só realizamos entregamos para a Cidade de Cachoeiro de Itapemirim.</span>

                                   </div>

                                   <div class="field-button">

                                          <input type="submit" value="Cadastrar">

                                   </div>

                            </form>

                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            $('.data_nascimento').mask('00/00/0000');

                            $('.cpf').mask('000.000.000-00', {reverse: true});

                            $('.cep').mask('00000-000');

                            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});

                            var SPMaskBehavior = function (val) {
                                   return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                                   },
                                   spOptions = {
                                   onKeyPress: function(val, e, field, options) {
                                   field.mask(SPMaskBehavior.apply({}, arguments), options);
                                   }
                            };

                            $('.telefone').mask(SPMaskBehavior, spOptions);

                            $('.telefone2').mask(SPMaskBehavior, spOptions);

                            $('#fisica').change(function(){

                                   if($(this).is(':checked')){

                                          $('.pessoa-fisica').removeClass('none');

                                          $('.pessoa-juridica').addClass('none');

                                   }

                            });

                            $('#juridica').change(function(){

                                   if($(this).is(':checked')){

                                          $('.pessoa-fisica').addClass('none');

                                          $('.pessoa-juridica').removeClass('none');

                                   }

                            });

                            $('form.registrar').submit(function(event){

                                   event.preventDefault();

                                   var form = document.querySelector('form.registrar');

                                   var email = $('form.registrar .email').val();

                                   var formData = new FormData(form);

                                   var button = $('form.registrar .field-button input');

                                   $.ajax(

                                          {

                                                 url: '/engine/cadastrar-cliente.php',

                                                 type: 'post',

                                                 data: formData,

                                                 dataType: 'json',

                                                 processData: false,  

                                                 contentType: false,

                                                 beforeSend: function(){

                                                        button.val('Cadastrando...');

                                                 }

                                          }

                                   ).done(function(msg){

                                          if(msg == 1){

                                                 window.location.href = "/cliente";

                                          }

                                   });

                            });

                     });

              </script>
              
       </body>

</html>