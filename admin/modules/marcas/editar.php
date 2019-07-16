<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $id = $_GET['id'];

       $buscaMarcas = $mysqli->query('SELECT * FROM `marcas` WHERE `id` = ' . $id);

       $marca = $buscaMarcas->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Editar Marca | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-editar">

                            <div class="titulo">

                                   Editar Marca

                            </div>

                            <div class="subtitulo">

                                   Editar Marca da loja

                            </div>

                            <form id="editar-marca">

                                   <div class="row">

                                          <div class="col-sm-6">

                                                 <div class="field-input">

                                                        <label for="nome">Nome: </label>

                                                        <input type="text" name="nome" class="nome" id="nome" value="<?=$marca->nome;?>" required>

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

                                                        <input type="submit" value="Editar" id="button-submit">

                                                        <label for="button-submit" class="button-submit-label">
                                                               
                                                               <i class="fas fa-paper-plane"></i>

                                                               <div class="loader"></div>
                                                        
                                                        </label>
                                                        
                                                 </div>

                                          </div>

                                   </div>

                            </form>

                     </div>

              </div>

              <?php include('../../../includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            var button = $('#button-submit');

                            $('.button-submit-label .loader').addClass('none');

                            $('#editar-marca').submit(function(event){

                                   event.preventDefault();

                                   var nome = $('form .nome').val();

                                   var fileData = $('form .imagem').prop('files')[0];

                                   var form = document.querySelector('form');

                                   var formData = new FormData(form);

                                   $.ajax(

                                          {

                                                 url: '/admin/modules/marcas/engine.php?tipo=editar&id=<?=$id?>',

                                                 type: 'post',

                                                 data: formData,

                                                 dataType: 'json',

                                                 processData: false,  

                                                 contentType: false,

                                                 beforeSend: function(){

                                                        button.val('Editando...');

                                                        $('.button-submit-label .loader').removeClass('none');

                                                        $('.button-submit-label i').addClass('none');

                                                 }

                                          }

                                   ).done(function(msg){

                                          button.val('Editado com Sucesso');

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