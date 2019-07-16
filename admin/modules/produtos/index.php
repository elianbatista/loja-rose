<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       require_once('../../../vendor/jbroadway/urlify/URLify.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('../../includes/head.php'); ?>

              <title>Produtos | Rose | Área Administrativa</title>

              <meta name="robots" content="noindex, nofollow">

       </head>

       <body>

              <?php include('../../includes/nav-bar.php'); ?>

              <div class="wrapper">

                     <div class="module-listagem">

                            <div class="button-case">

                                   <a href="/admin/produtos/adicionar" class="button-adicionar">Adicionar Novo Produto</a>

                            </div>

                            <div class="row">

                                   <div class="col-sm-12">

                                          <div class="titulo">

                                                 Listagem de Produtos

                                          </div>

                                          <div class="subtitulo">

                                                 Gerencie os Produtos Cadastrados no Site

                                          </div>

                                          <div class="listagem">

                                                 <?php

                                                 $buscaProdutos = $mysqli->query('SELECT * FROM `produtos`');

                                                 while($produto = $buscaProdutos->fetch_object()){

                                                 ?>

                                                 <a href="/admin/produtos/editar/<?=URLify::filter($produto->nome)?>-<?=$produto->id?>">

                                                        <div class="listagem-conteudo">

                                                               <div class="row">

                                                                      <div class="col-sm-1">

                                                                             <img src="/admin/imagens/produtos/<?=$produto->imagem?>" alt="">

                                                                      </div>

                                                                      <div class="col-sm-10">

                                                                             <div class="titulo"><?=$produto->nome;?></div>

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