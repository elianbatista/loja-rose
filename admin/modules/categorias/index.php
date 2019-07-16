<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       require_once('../../../vendor/jbroadway/urlify/URLify.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Categorias | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-listagem">

                            <div class="button-case">

                                   <a href="/admin/categorias/adicionar" class="button-adicionar">Adicionar Nova Categoria</a>

                            </div>

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="titulo">

                                                 Listagem de Categorias

                                          </div>

                                          <div class="subtitulo">

                                                 Gerencie as Categorias cadastradas no site

                                          </div>

                                          <div class="listagem">

                                                 <?php

                                                 $buscaCategorias = $mysqli->query('SELECT * FROM `categorias`');

                                                 while($categoria = $buscaCategorias->fetch_object()){

                                                 ?>

                                                 <a href="/admin/categorias/editar/<?=URLify::filter($categoria->titulo)?>-<?=$categoria->id?>">

                                                        <div class="listagem-conteudo">

                                                               <div class="row">

                                                                      <div class="col-sm-12">


                                                                             <div class="titulo"><?=$categoria->titulo;?></div>


                                                                      </div>

                                                                      <div class="col-sm-12">

                                                                             <div class="subtitulo">
                                                                                    
                                                                                    <?php

                                                                                           if($categoria->categoria_pai != 0){

                                                                                                  $buscaCategoriaPai = $mysqli->query('SELECT * FROM `categorias` WHERE `id` = ' . $categoria->categoria_pai);

                                                                                                  $categoriaPai = $buscaCategoriaPai->fetch_object();

                                                                                                  echo $categoriaPai->titulo;

                                                                                           } else {

                                                                                                  echo ' ';

                                                                                           }

                                                                                    ?>
                                                                      
                                                                      
                                                                             </div>

                                                                      </div>
                                                               
                                                               </div>

                                                        </div>

                                                 </a>

                                                 <?php

                                                 }

                                                 ?>

                                          </div>

                                   </div>

                            </div>

                     </div>

              </div>

       </body>

</html>