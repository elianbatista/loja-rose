<?php

       require_once('engine/connect.php');

       session_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title>Login | Área do Cliente | Rose | Moda Masculina</title>

              <meta name="description" content="Compre já as melhores roupas da moda masculina atual, entregamos para todos lugares de Cachoeiro de Itapemirim sem valor de entrega." />

              <meta name="keywords" content="roupas, masculinas, moda, masculina, entrega, grátis, cachoeiro de itapemirim, cachoeiro"/>

              <meta name="robots" content="index, follow">

              <style>

                     input {

                            text-align: center;

                     }

              </style>

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

                                   <div class="col-sm-6" style="padding: 0px 30px;">

                                          <div class="painel-title">

                                                 Faça o seu login!

                                          </div>

                                          <form class="login">

                                                 <div class="field-input">

                                                        <label for="email">E-mail:</label>

                                                        <input type="text" name="email" class="email" required>

                                                 </div>

                                                 <div class="field-input">

                                                        <label for="senha">Senha:</label>

                                                        <input type="password" name="senha" class="senha" id="senha" required>

                                                 </div>

                                                 <div class="field-button">

                                                        <input type="submit" value="Logar">

                                                 </div>

                                          </form>

                                   </div>

                                   <div class="col-sm-6" style="padding: 0px 30px;">

                                          <div class="painel-title">

                                                 Não Tenho Cadastro!

                                          </div>

                                          <form class="registrar">

                                                 <div class="field-input">

                                                        <label for="email">E-mail: </label>

                                                        <input type="email" class="email" name="email" required>

                                                 </div>

                                                 <div class="field-button">

                                                        <input type="submit" value="Registrar">

                                                 </div>

                                          </form>

                                   </div>
                            
                            </div>

                     </div>

              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            $('form.login').submit(function(event){

                                   event.preventDefault();

                                   var form = document.querySelector('form.login');

                                   var email = $('form.login .email').val();

                                   var formData = new FormData(form);

                                   var button = $('form.login .field-button input');

                                   $.ajax(

                                          {

                                                 url: '/engine/login-cliente.php',

                                                 type: 'post',

                                                 data: formData,

                                                 dataType: 'json',

                                                 processData: false,  

                                                 contentType: false,

                                                 beforeSend: function(){

                                                        button.val('Validando...');

                                                 }

                                          }

                                   ).done(function(msg){

                                          if(msg == 1){

                                                 window.location.href = "/cliente/";

                                          } else if(msg == 2){

                                                 alert("E-mail ou Senha Incorretos");

                                          }

                                   });

                            });

                            $('form.registrar').submit(function(event){

                                   event.preventDefault();

                                   var form = document.querySelector('form.registrar');

                                   var email = $('form.registrar .email').val();

                                   var formData = new FormData(form);

                                   var button = $('form.registrar .field-button input');

                                   $.ajax(

                                          {

                                                 url: '/engine/valida-email.php',

                                                 type: 'post',

                                                 data: formData,

                                                 dataType: 'json',

                                                 processData: false,  

                                                 contentType: false,

                                                 beforeSend: function(){

                                                        button.val('Validando...');

                                                 }

                                          }

                                   ).done(function(msg){

                                          if(msg == 1){

                                                 window.location.href = "/cliente/cadastrar/";

                                          } else if(msg == 2){

                                                 alert("O E-mail já está sendo usado");

                                          }

                                   });

                            });

                     });

              </script>
              
       </body>

</html>