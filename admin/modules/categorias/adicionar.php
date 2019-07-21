<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Adicionar Categoria | Rose | Área Administrativa</title>

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

                                                        Adicionar Nova Categoria

                                                 </div>

                                                 <div class="subtitulo">

                                                        Insira uma nova categoria na loja

                                                 </div>

                                                 <form id="adicionar-categoria">

                                                        <div class="row">

                                                               <div class="col-sm-12">

                                                                      <div class="field-input">

                                                                             <label for="titulo">Título: </label>

                                                                             <input type="text" name="titulo" class="titulo1" id="titulo" required>

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-12">

                                                                      <div class="field-input">

                                                                             <label for="titulo">Tags(SEO): </label>

                                                                             <input type="text" name="tags" class="tags" id="tags" placeholder="Exemplo: camisas, bermudas, bonés" required>

                                                                      </div>

                                                               </div>

                                                        </div>

                                                        <div class="row">

                                                               <div class="col-sm-4">

                                                                      <div class="field-select">

                                                                             <label for="sub_categoria">Categoria Filho?</label>

                                                                             <select name="sub_categoria" id="sub_categoria" class="sub_categoria">

                                                                                    <option value="0">Não</option>

                                                                                    <option value="1">Sim</option>

                                                                             </select>

                                                                      </div>

                                                               </div>

                                                               <div class="col-sm-8">

                                                                      <div class="field-select">

                                                                             <label for="categoria_pai">Categoria Pai: </label>

                                                                             <select name="categoria_pai" id="categoria_pai" class="categoria_pai">

                                                                                    <option value=""></option>

                                                                                    <?php

                                                                                    $buscaCategoria = $mysqli->query('SELECT * FROM `categorias` WHERE `sub_categoria` = 0');

                                                                                    while($categoria = $buscaCategoria->fetch_object()){

                                                                                    ?>

                                                                                    <option value="<?=$categoria->id?>"><?=$categoria->titulo?></option>

                                                                                    <?php

                                                                                    }

                                                                                    ?>

                                                                             </select>

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

                            $('#adicionar-categoria').submit(function(event){

                                   event.preventDefault();

                                   var titulo = $('form .titulo1').val();

                                   var sub_categoria = $('.sub_categoria').val();

                                   var categoria_pai = $('.categoria_pai').val();

                                   var tags = $('.tags').val();

                                   $.ajax(

                                          {

                                                 url: '/admin/modules/categorias/engine.php?tipo=adicionar',

                                                 type: 'post',

                                                 data: {

                                                        titulo: titulo,

                                                        sub_categoria: sub_categoria,

                                                        categoria_pai: categoria_pai,

                                                        tags: tags

                                                 },

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

                                                 window.location.href = "/admin/modules/categorias/";

                                          }

                                   });

                            });

                     });

              </script>

       </body>

</html>