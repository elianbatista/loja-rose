<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       require_once('../../../vendor/jbroadway/urlify/URLify.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Marcas | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-listagem">

                            <div class="button-case">

                                   <a href="/admin/marcas/adicionar" class="button-adicionar">Adicionar Nova Marca</a>

                            </div>

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="titulo">

                                                 Listagem de Marcas

                                          </div>

                                          <div class="subtitulo">

                                                 Gerencie as Marcas cadastradas no site

                                          </div>

                                          <div class="listagem">

                                                 <?php

                                                 $buscaMarcas = $mysqli->query('SELECT * FROM `marcas`');

                                                 while($marca = $buscaMarcas->fetch_object()){

                                                 ?>

                                                 <a href="/admin/marcas/editar/<?=URLify::filter($marca->nome)?>-<?=$marca->id?>">

                                                        <div class="listagem-conteudo">

                                                               <div class="row">

                                                                      <div class="col-sm-1">

                                                                             <img src="/admin/imagens/marcas/<?=$marca->imagem?>" alt="">

                                                                      </div>

                                                                      <div class="col-sm-10">


                                                                             <div class="titulo"><?=$marca->nome;?></div>


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