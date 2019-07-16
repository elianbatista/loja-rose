<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $id = $_GET['id'];

       $buscaCategoria = $mysqli->query('SELECT * FROM `categorias` WHERE `id` = ' . $id);

       $categoria = $buscaCategoria->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Editar Categoria | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-editar">

                            <div class="titulo">

                                   Editar Categoria

                            </div>

                            <div class="subtitulo">

                                   Editar categoria da loja

                            </div>

                            <form id="editar-categoria">

                                   <div class="row">

                                          <div class="col-sm-12">

                                                 <div class="field-input">

                                                        <label for="titulo">Título: </label>

                                                        <input type="text" name="titulo" class="titulo1" id="titulo" value="<?=$categoria->titulo;?>" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-4">

                                                 <div class="field-select">

                                                        <label for="sub_categoria">Categoria Filho?</label>

                                                        <select name="sub_categoria" id="sub_categoria" class="sub_categoria">

                                                               <option value="0" <?php if($categoria->sub_categoria == 0){echo 'selected';}?>>Não</option>

                                                               <option value="1" <?php if($categoria->sub_categoria == 1){echo 'selected';}?>>Sim</option>

                                                        </select>

                                                 </div>

                                          </div>

                                          <div class="col-sm-8">

                                                 <div class="field-select">

                                                        <label for="categoria_pai">Categoria Pai: </label>

                                                        <select name="categoria_pai" id="categoria_pai" class="categoria_pai">

                                                               <option value="0"></option>

                                                               <?php

                                                               $buscaCategoriaPai = $mysqli->query('SELECT * FROM `categorias` WHERE `sub_categoria` = 0');

                                                               while($categoriaPai = $buscaCategoriaPai->fetch_object()){

                                                               ?>

                                                               <option value="<?=$categoriaPai->id?>" <?php if($categoria->categoria_pai == $categoriaPai->id){ echo 'selected'; } ?>><?=$categoriaPai->titulo?></option>

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

                            $('#editar-categoria').submit(function(event){

                                   event.preventDefault();

                                   var titulo = $('form .titulo1').val();

                                   var sub_categoria = $('.sub_categoria').val();

                                   var categoria_pai = $('.categoria_pai').val();

                                   $.ajax(

                                          {

                                                 url: '/admin/modules/categorias/engine.php?tipo=editar&id=<?=$id?>',

                                                 type: 'post',

                                                 data: {

                                                        titulo: titulo,

                                                        sub_categoria: sub_categoria,

                                                        categoria_pai: categoria_pai

                                                 },

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

                                                 window.location.href = "/admin/modules/categorias/";

                                          }

                                   });

                            });

                     });

              </script>

       </body>

</html>