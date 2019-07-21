<div class="wrapper">

       <?php

       $buscarPedidos = $mysqli->query('SELECT * FROM `pedidos`');

       $valorVendas = 0;

       while($pedidos = $buscarPedidos->fetch_object()){

              $preco_total = str_replace('.', ',', $pedidos->preco_total);

              $preco_total = str_replace(',', '.', $preco_total);

              $valorVendas += $preco_total;

       }

       $valorVendas = str_replace('.', ',', $valorVendas);

       ?>

       <div class="dashboard">

              <div class="row">

                     <div class="col-sm-12">

                            <div class="box-card">

                                   <div class="titulo">Bem Vindo</div>

                                   <div class="subtitulo">Essa é a área administrativa da loja Rose</div>

                            </div>

                     </div>

                     <div class="col-sm-12">

                            <div class="box-card">

                                   <div class="informacoes">

                                          Valor Total das Vendas: <span>R$ <?=$valorVendas;?></span>

                                   </div>

                            </div>

                     </div>

              </div>

              <div class="row">



              </div>

              

       </div>

</div>