<?php

       require_once('engine/connect.php');

       session_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

       <head>

              <?php include('includes/head.php'); ?>

              <title>Fale Conosco | Rose | Moda Masculina</title>

              <meta name="description" content="Compre já as melhores roupas da moda masculina atual, entregamos para todos lugares de Cachoeiro de Itapemirim sem valor de entrega." />

              <meta name="keywords" content="roupas, masculinas, moda, masculina, entrega, grátis, cachoeiro de itapemirim, cachoeiro"/>

              <meta name="robots" content="index, follow">

       </head>

       <body>

              <?php include('includes/topo.php'); ?>

              <div class="intern-title">

                     <div class="container">

                            Fale Conosco

                     </div>

              </div>

              <section id="fale-conosco">

                     <div class="container">

                            <div class="fale-conosco-title">
                                          
                                   Loja Rose Moda Masculina

                            </div>

                            <div class="row">

                                   <div class="col-sm-6">
                                   
                                          <div class="line-bottom"></div>

                                          <div class="fale-conosco-text">
                                          
                                                 Caso haja alguma dúvida ou sugestão mande-nos uma mensagem pelo formulário ao lado,
                                                 nossa equipe o responderá o mais rápido possível, ou então entre em contato diretamente
                                                 conosco com os dados abaixo. <br/><br/>

                                                 <span class="titulo">Igor Miguel Rosa</span>
                                                 <span class="info"><i class="material-icons">email</i>igor@lojarose.com.br</span>
                                                 <span class="info"><i class="material-icons">phone</i>(28) 9 9971-2412</span><br/>

                                                 <span class="titulo">Elian Lima Batista</span>
                                                 <span class="info"><i class="material-icons">email</i>elian@lojarose.com.br</span>
                                                 <span class="info"><i class="material-icons">phone</i>(28) 9 9961-4261</span>
                                                 

                                          </div>

                                   </div>

                                   <div class="col-sm-6">

                                          <form class="contato">

                                                 <div class="row">

                                                        <div class="col-sm-12">

                                                               <div class="field-input">

                                                                      <label for="">Nome:</label>
                                                                      <input type="text" class="nome" id="nome" name="nome">

                                                               </div>

                                                        </div>

                                                        <div class="col-sm-12">

                                                               <div class="field-input">

                                                                      <label for="">Telefone:</label>
                                                                      <input type="text" class="telefone" id="telefone" name="telefone">

                                                               </div>

                                                        </div>

                                                        <div class="col-sm-12">

                                                               <div class="field-input">

                                                                      <label for="">E-mail:</label>
                                                                      <input type="email" class="email" id="email" name="email">

                                                               </div>

                                                        </div>

                                                        <div class="col-sm-12">

                                                               <div class="field-input">

                                                                      <label for="">Assunto:</label>
                                                                      <input type="text" class="assunto" id="assunto" name="assunto">

                                                               </div>

                                                        </div>

                                                        <div class="col-sm-12">

                                                               <div class="field-textarea">

                                                                      <label for="">Mensagem:</label>
                                                                      
                                                                      <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>

                                                               </div>

                                                        </div>

                                                        <div class="col-sm-12">

                                                               <div class="field-button">

                                                                      <input type="submit" class="enviar" value="Enviar">

                                                               </div>

                                                        </div>

                                                 </div>

                                          </form>

                                   </div>

                            </div>

                     </div>
              
              </section>

              <?php include('includes/footer.php');?>

              <?php include('includes/javascript.php'); ?>

              <script>

                     var SPMaskBehavior = function (val) {

                            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';

                     },

                     spOptions = {

                            onKeyPress: function(val, e, field, options) {

                                   field.mask(SPMaskBehavior.apply({}, arguments), options);

                            }

                     };

                     $('.telefone').mask(SPMaskBehavior, spOptions);

                     $('form.contato').submit(function(event){

                            event.preventDefault();

                            var form = document.querySelector('form');

                            var formData = new FormData(form);

                            var button = $('form .field-button input');

                            $.ajax(

                                   {

                                          url: '/engine/fale_conosco.php',

                                          type: 'post',

                                          data: formData,

                                          dataType: 'json',

                                          processData: false,  

                                          contentType: false,

                                          beforeSend: function(){

                                                 button.val('Enviando...');

                                          },

                                          success: msg => {

                                                 if(msg == 1){

                                                        alert('Mensagem enviada com sucesso.');

                                                        window.location.href = "/fale-conosco";

                                                 } else {

                                                        alert("Ocorreu algum erro na hora de adicionar o produto.");

                                                 }

                                          }

                                   }

                            )
                     
                     });


              </script>
              
       </body>

</html>