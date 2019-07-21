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

       $buscarCliente = $mysqli->query('SELECT * FROM `clientes` WHERE `id` = "' . $_SESSION['id'] . '"');

       $cliente = $buscarCliente->fetch_object();

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

                                          <section id="painel-cliente">

                                                 <form class="atualizar-dados" style="width: 100%;">

                                                        <div class="row">

                                                               <div class="col-sm-8">

                                                                      <div class="field-input">

                                                                             <label for="email">Nome Completo:</label>

                                                                             <input type="text" name="nome" class="nome" value="<?=$cliente->nome?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-4">

                                                                      <div class="field-input">

                                                                             <label for="email">CPF:</label>

                                                                             <input type="text" name="cpf" class="cpf" placeholder="___.___.___-__" value="<?=$cliente->cpf?>">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-5">

                                                                      <div class="field-input">

                                                                             <label for="email">Razão Social:</label>

                                                                             <input type="text" name="razao_social" class="razao_social" value="<?=$cliente->razao_social?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-5">

                                                                      <div class="field-input">

                                                                             <label for="email">Inscrição Estadual:</label>

                                                                             <input type="text" name="inscricao_estadual" class="inscricao_estadual" value="<?=$cliente->inscricao_estadual?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-2">

                                                                      <div class="field-input">

                                                                             <label for="email">CNPJ:</label>

                                                                             <input type="text" name="cnpj" class="cnpj" placeholder="__.___.___/____-__" value="<?=$cliente->cnpj?>">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-4">

                                                                      <div class="field-input">

                                                                             <label for="email">Telefone:</label>

                                                                             <input type="text" name="telefone" class="telefone" placeholder="(__) ____-____" required value="<?=$cliente->telefone?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-4">

                                                                      <div class="field-input">

                                                                             <label for="email">Telefone Secundário:</label>

                                                                             <input type="text" name="telefone2" class="telefone2" placeholder="(__) ____-____" required value="<?=$cliente->telefone2?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-4">

                                                                      <div class="field-input">

                                                                             <label for="email">Data de Nascimento:</label>

                                                                             <input type="text" name="data_nascimento" class="data_nascimento" placeholder="__/__/____" required value="<?=$cliente->nascimento?>">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-6">

                                                                      <div class="field-input">

                                                                             <label for="email">Email:</label>

                                                                             <input type="email" name="email" class="email" required value="<?=$cliente->email?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-6">

                                                                      <div class="field-input">

                                                                             <label for="senha">Senha:</label>

                                                                             <input type="password" name="senha" class="senha">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-4">

                                                                      <div class="field-input">

                                                                             <label for="senha">CEP:</label>

                                                                             <input type="text" name="cep" class="cep" placeholder="_____-___" required value="<?=$cliente->cep?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-5">

                                                                      <div class="field-input">

                                                                             <label for="senha">Rua:</label>

                                                                             <input type="text" name="rua" class="rua" required value="<?=$cliente->rua?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-3">

                                                                      <div class="field-input">

                                                                             <label for="senha">Número:</label>

                                                                             <input type="text" name="numero" class="numero" required value="<?=$cliente->numero?>">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-5">

                                                                      <div class="field-input">

                                                                             <label for="senha">Bairro:</label>

                                                                             <input type="text" name="bairro" class="bairro" required value="<?=$cliente->bairro?>">  

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-2">

                                                                      <div class="field-input">

                                                                             <label for="senha">Estado:</label>

                                                                             <select name="estado" class="estado" required >

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

                                                                             <input type="text" name="complemento" class="complemento" required value="<?=$cliente->complemento?>">

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-6">

                                                                      <div class="field-input">

                                                                             <label for="senha">Ponto de Referência:</label>

                                                                             <input type="text" name="referencia" class="referencia" required value="<?=$cliente->referencia?>">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="aviso">

                                                               <span>No momento só realizamos entregamos para a Cidade de Cachoeiro de Itapemirim.</span>

                                                        </div>

                                                        <div class="field-button">

                                                               <input type="submit" value="Atualizar Dados">

                                                        </div>

                                                 </form>

                                          </section>

                                   </div>

                            </div>
                     
                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     $('form.atualizar-dados').submit(function(event){

                            event.preventDefault();

                            var form = document.querySelector('form.atualizar-dados');

                            var formData = new FormData(form);

                            var button = $('form.atualizar-dados .field-button input');

                            $.ajax(

                                   {

                                          url: '/engine/atualizar_dados.php',

                                          type: 'post',

                                          data: formData,

                                          dataType: 'json',

                                          processData: false,  

                                          contentType: false,

                                          beforeSend: function(){

                                                 button.val('Atualizando...');

                                          }

                                   }

                            ).done(function(msg){

                                   if(msg == 1){

                                          window.location.href = "/cliente";

                                   }

                            });

                     });

              </script>
              
       </body>

</html>