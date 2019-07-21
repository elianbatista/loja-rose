<section id="lancamentos">

       <div class="container">

              <div class="row">

                     <div class="col-sm-12">

                            <div class="section-title">

                                   Últimas Novidades

                            </div>

                     </div>

              </div>

              <div class="row">

                     <?php

                     $buscarLancamentos = $mysqli->query('SELECT * FROM `produtos` ORDER BY `id` DESC LIMIT 4');

                     while($lancamento = $buscarLancamentos->fetch_object()){

                     ?>

                     <div class="col-6 col-sm-6 col-lg-3">

                            <a href="/produto/<?=$lancamento->id;?>/<?=URLify::filter($lancamento->nome);?>">

                                   <div class="case-produto">

                                          <div class="white-background"></div>

                                          <img src="/admin/imagens/produtos/<?=$lancamento->imagem;?>" alt="<?=$lancamento->nome?>">

                                          <div class="produto-titulo">

                                                 <?=$lancamento->nome;?>

                                          </div>

                                          <div class="produto-preco">
                                          
                                                 R$ <?=$lancamento->preco;?>
                                          
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

</section>

<section id="lancamentos">

       <div class="container">

              <div class="row">

                     <div class="col-sm-12">

                            <div class="section-title">

                                   Ofertas Imperdíveis

                            </div>

                     </div>

              </div>

              <div class="row">

                     <?php

                     $buscarOfertas = $mysqli->query('SELECT * FROM `produtos` ORDER BY RAND() LIMIT 4');

                     while($oferta = $buscarOfertas->fetch_object()){

                     ?>

                     <div class="col-6 col-sm-6 col-lg-3">

                            <a href="/produto/<?=$oferta->id?>/<?=URLify::filter($oferta->nome);?>">

                                   <div class="case-produto">

                                          <div class="white-background"></div>

                                          <img src="/admin/imagens/produtos/<?=$oferta->imagem;?>" alt="<?=$oferta->nome?>">

                                          <div class="produto-titulo">

                                                 <?=$oferta->nome;?>

                                          </div>

                                          <div class="produto-preco">
                                          
                                                 R$ <?=$oferta->preco;?>
                                          
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

</section>
