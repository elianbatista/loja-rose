<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Adicionar Marca | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-adicionar">

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="box-card">

                                                 <div class="titulo">

                                                        Adicionar Nova Marca

                                                 </div>

                                                 <div class="subtitulo">

                                                        Insira uma nova marca na loja

                                                 </div>

                                                 <form id="adicionar-marca" method="post" enctype="multipart/form-data" action="/admin/modules/marcas/engine.php?tipo=adicionar">

                                                        <div class="row">

                                                               <div class="col-sm-6">

                                                                      <div class="field-input">

                                                                             <label for="nome">Nome: </label>

                                                                             <input type="text" name="nome" class="nome" id="nome" required>

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-6">

                                                                      <div class="field-file">

                                                                             <label for="imagem">Foto de Capa: </label>

                                                                             <input type="file" name="imagem" class="imagem" id="imagem">

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-12">

                                                                      <div class="field-button">

                                                                             <input type="submit" value="Adicionar" id="button-submit">

                                                                             <label for="button-submit" class="button-submit-label">
                                                                                    
                                                                                    <i class="material-icons">send</i>

                                                                                    <div class="loader"></div>
                                                                             
                                                                             </label>
                                                                             
                                                                      </div>

                                                               </div>

                                                        </div>

                                                 </form>

                                          </div>

                                   </div>

                            </div>

                     </div>

              </div>

              <?php include('../../../includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            var button = $('#button-submit');

                            $('.button-submit-label .loader').addClass('none');

                            $('#adicionar-marca').submit(function(event){

                                   event.preventDefault();

                                   var fileData = $('form .imagem').prop('files')[0];

                                   var form = document.querySelector('form');

                                   var formData = new FormData(form);

                                   $.ajax(

                                          {

                                                 url: '/admin/modules/marcas/engine.php?tipo=adicionar',

                                                 type: 'post',

                                                 data: formData,

                                                 dataType: 'json',

                                                 processData: false,  

                                                 contentType: false,

                                                 beforeSend: function(){

                                                        button.val('Adicionando...');

                                                        $('.button-submit-label .loader').removeClass('none');

                                                        $('.button-submit-label i').addClass('none');

                                                 }

                                          }

                                   ).done(function(msg){

                                          button.val('Adicionado com Sucesso');

                                          $('.button-submit-label .loader').addClass('none');

                                          $('.button-submit-label i').removeClass('none');

                                          if(msg == 1){

                                                 window.location.href = "/admin/modules/marcas/";

                                          }

                                   });

                            });

                     });

              </script>

       </body>

</html>