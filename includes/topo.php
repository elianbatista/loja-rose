<section id="topo">

       <div class="background-gray"></div>

       <div class="container container">

              <div class="left-case">
                     
                     <i class="material-icons">menu</i>

                     <div class="case-img">
                     
                            <a href="/">

                                   <img src="/img/logo/logo-fundo-branco.png" alt="Logo Loja Rose Moda Masculina">

                            </a>

                     </div>

              </div>

              <div class="right-case">  

                     <?php

                     if(isset($_SESSION['id']) && isset($_SESSION['tipo'])){

                     ?>

                     <a href="/cliente/">
              
                            <div class="logar">

                                   <i class="material-icons">person</i>

                                   <span><?=$_SESSION['nome'];?></span>

                            </div>

                     </a>

                     <?php

                     } else {

                     ?>

                     <a href="/cliente/login">
                            
                            <div class="logar">

                                   <i class="material-icons">person</i>

                                   <span>Faça Login</span>

                            </div>

                     </a>

                     <?php

                     }

                     ?>

                     <a href="/cliente/carrinho">

                            <div class="carrinho">
                            
                                   <i class="material-icons">shopping_cart</i>

                            </div>

                     </a>
              
              </div>
              
       </div>

       <nav>

              <div class="top-bar">

                     <div class="container">

                            <?php

                            if(isset($_SESSION['id'])){

                            ?>

                            <a href="/cliente">

                                   <div class="login">

                                          <i class="material-icons">person</i>

                                          <span><?=$_SESSION['nome'];?></span>

                                   </div>

                            </a>

                            <?php

                            } else {

                            ?>

                            <a href="/cliente/login">

                                   <div class="login">

                                          <i class="material-icons">person</i>

                                          <span>Faça Login</span>

                                   </div>

                            </a>

                            <?php

                            }

                            ?>

                            <div class="right-case">

                                   <i class="material-icons">close</i>

                            </div>

                     </div>

              </div>

              <div class="container">
       
                     <ul>
                     
                            <li>
                            
                                   <a href="/">Início</a>
 
                            </li>

                            <li>
                            
                                   <a href="/produtos/camisas">Camisas</a>

                            </li>

                            <li>
                            
                                   <a href="/produtos/bermudas">Bermudas</a>

                            </li>

                            <li>
                            
                                   <a href="/produtos/moletons">Moletons</a>

                            </li>

                            <li>
                            
                                   <a href="/fale-conosco">Fale Conosco</a>

                            </li>

                     </ul>

              </div>

       </nav>

</section>