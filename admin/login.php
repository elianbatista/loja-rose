<?php

       require_once('../engine/connect.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <link rel="stylesheet" href="css/login.css">

              <title>Fazer Login | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <div class="box-login">

                     <img src="../img/logo/logo-fundo-branco.png" alt="Logo Loja Rose Moda Masculina">

                     <div class="row">

                            <form id="form-login">
                     
                                   <div class="field-input col-sm-12">

                                          <input type="email" class="email" name="email" placeholder="E-mail" required autofocus>

                                   </div>

                                   <div class="field-input col-sm-12">

                                          <input type="password" class="senha" name="senha" placeholder="Senha" required>

                                   </div>

                                   <div class="field-button col-sm-12">

                                          <input type="submit" class="login" value="Logar">

                                   </div>

                            </form>

                     </div>

              </div>
              
       </body>

       <?php include('../includes/javascript.php'); ?>

       <script>

              $(document).ready(function(){

                     $('#form-login').submit(function(event){

                            event.preventDefault();

                            var email = $('.email').val();

                            var senha = $('.senha').val();

                            var button = $('.login');

                            $.ajax(

                                   {

                                          url: 'engine/login.php',

                                          type: 'post',

                                          data: {

                                                 email: email,

                                                 senha: senha

                                          },

                                          beforeSend: function(){

                                                 button.val('Enviando...');

                                          }

                                   }

                            ).done(function(msg){

                                   if(msg == 1){

                                          button.val('E-mail ou Senha Incorreto');

                                   } else {

                                          button.val('Logado com Sucesso');

                                          window.location.href = "/admin/";

                                   }

                            });

                     });

              });

       </script>

</html>