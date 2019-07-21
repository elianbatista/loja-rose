<?php

       require_once('engine/connect.php');

       session_start();

       $categoria = $_GET['categoria'];

       $categoriaTitulo = mb_convert_case($categoria, MB_CASE_TITLE, 'UTF-8');

       $buscarCategoria = $mysqli->query('SELECT * FROM `categorias` WHERE `titulo` = "' . $categoriaTitulo . '"');

       $categoria = $buscarCategoria->fetch_object();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title><?=$categoriaTitulo;?> | Rose | Moda Masculina</title>

              <meta name="description" content="<?=$categoria->nome;?>" />

              <meta name="keywords" content="<?=$categoria->tags;?>"/>

              <meta name="robots" content="index, follow">

              <link rel="stylesheet" href="vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="intern-title">

                     <div class="container">

                            <?=$categoriaTitulo;?>

                     </div>

              </div>

              <div class="container">

                     <div class="row">

                            <?php

                            $buscarProdutos = $mysqli->query('SELECT * FROM `produtos` WHERE `categoria` = "' . $categoria->id . '"');

                            if($buscarProdutos->num_rows == 0){?>

                            <div class="produto-nenhum" align="center">

                                   <div class="icon-nenhum">

                                          <i class="material-icons">remove_shopping_cart</i>

                                   </div>

                                   Nenhum produto encontrado nessa categoria.

                            </div>
                                   
                            <?php }

                            while($produto = $buscarProdutos->fetch_object()){

                            ?>

                            <div class="col-6 col-sm-6 col-lg-3">

                                   <a href="/produto/<?=$produto->id?>/<?=URLify::filter($produto->nome);?>">

                                          <div class="case-produto">

                                                 <div class="white-background"></div>

                                                 <img src="/admin/imagens/produtos/<?=$produto->imagem;?>" alt="<?=$produto->nome?>">

                                                 <div class="produto-titulo">

                                                        <?=$produto->nome;?>

                                                 </div>

                                                 <div class="produto-preco">
                                                 
                                                        R$ <?=$produto->preco;?>
                                                 
                                                 </div>

                                                 <div class="adicionar-carrinho">
                                                 
                                                        <span>+ Detalhes</span>
                                                 
                                                 </div>

                                          </div>

                                   </a>

                            </div>

                            <?php

                            }

                            ?>

                     </div>

              </div>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>
              
       </body>

</html>