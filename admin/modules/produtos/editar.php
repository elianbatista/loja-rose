<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $id = $_GET['id'];

       $buscaProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $id);

       $produto = $buscaProduto->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Editar Produto | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-editar">

                            <div class="titulo">

                                   Editar Produto

                            </div>

                            <div class="subtitulo">

                                   Editar produto da loja

                            </div>

                            <form id="editar-produto">
       
                                   <div class="row">

                                          <div class="col-sm-8">

                                                 <div class="field-input">

                                                        <label for="titulo">Nome: </label>

                                                        <input type="text" name="nome" class="nome" id="nome" value="<?=$produto->nome?>" required>

                                                 </div>

                                          </div>

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="titulo">Quantidade em Estoque: </label>

                                                        <input type="text" name="quantidade_estoque" class="quantidade_estoque" id="quantidade_estoque" value="<?=$produto->quantidade_estoque?>" required>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-12">

                                                 <div class="field-textarea">

                                                        <label for="titulo">Descrição do Produto: </label>

                                                        <textarea name="descricao_produto" id="descricao_produtos" rows="10"><?=$produto->descricao_produto?></textarea>

                                                 </div>

                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-6">

                                                 <div class="field-select">

                                                        <label for="categoria">Categoria: </label>

                                                        <select name="categoria" class="categoria" id="categoria">

                                                               <?php

                                                               $buscarCategorias = $mysqli->query('SELECT * FROM `categorias` WHERE `sub_categoria` = 0');

                                                               while($categoria = $buscarCategorias->fetch_object()){

                                                               ?>

                                                               <option value="<?=$categoria->id;?>" <?php if($categoria->id == $produto->categoria){ echo 'selected'; } ?>><?=$categoria->titulo;?></option>

                                                               <?php

                                                                      $buscarCategoriasFilho = $mysqli->query('SELECT * FROM `categorias` WHERE `sub_categoria` = 1 AND `categoria_pai` = ' . $categoria->id);

                                                                      while($categoriaFilho = $buscarCategoriasFilho->fetch_object()){

                                                               ?>

                                                               <option value="<?=$categoriaFilho->id;?>" <?php if($categoria->id == $produto->categoria){ echo 'selected'; } ?>>&nbsp;&nbsp;&nbsp;<?=$categoriaFilho->titulo;?></option>

                                                               <?php

                                                                      }

                                                               }

                                                               ?>

                                                        </select>

                                                 </div>

                                          </div>

                                          <div class="col-sm-6">

                                                 <div class="field-select">

                                                        <label for="marca">Marca: </label>

                                                        <select name="marca" id="marca" class="marca">

                                                               <?php

                                                               $buscarMarcas = $mysqli->query('SELECT * FROM `marcas`');
                                                               
                                                               while($marca = $buscarMarcas->fetch_object()){

                                                               ?>
                                                               
                                                               <option value="<?=$marca->id;?>" <?php if($marca->id == $produto->marca){ echo 'selected'; } ?>><?=$marca->nome;?></option>
                                                               
                                                               <?php

                                                               }

                                                               ?>

                                                        </select>

                                                 </div>
                                          
                                          </div>

                                   </div>

                                   <div class="row">

                                          <div class="col-sm-4">

                                                 <div class="field-input">

                                                        <label for="titulo">Preço: </label>

                                                        <input type="text" name="preco" class="preco" id="preco" placeholder="R$ 0,00" required value="<?=$produto->preco?>">

                                                 </div>

                                          </div>

                                          <div class="col-sm-2">

                                                 <div class="field-input">

                                                        <label for="tamanho">Tamanho: </label>

                                                        <input type="text" name="tamanho" class="tamanho" id="tamanho" required value="<?=$produto->tamanho?>">

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

              <?php include('../../../includes/javascript.php'); ?>

              <script>

                     $(document).ready(function(){

                            tinymce.init({selector:'textarea'});

                            $('.preco').mask("#.##0,00", {reverse: true});   

                            var button = $('#button-submit');

                            $('.button-submit-label .loader').addClass('none');

                            $('#editar-produto').submit(function(event){

                                   event.preventDefault();

                                   var fileData = $('form .imagem').prop('files')[0];

                                   var form = document.querySelector('form');

                                   var formData = new FormData(form);

                                   $.ajax(

                                          {

                                                 url: '/admin/modules/produtos/engine.php?tipo=editar&id=<?=$id?>',

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

                                                 window.location.href = "/admin/modules/produtos/";

                                          }

                                   });

                            });

                     });

              </script>

       </body>

</html>