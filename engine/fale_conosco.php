<?php

       use PHPMailer\PHPMailer\PHPMailer;

       use PHPMailer\PHPMailer\Exception;

       require '../vendor/autoload.php';

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $nome = $_POST['nome'];

       $telefone = $_POST['telefone'];

       $email = $_POST['email'];

       $assunto = $_POST['assunto'];

       $mensagem = $_POST['mensagem'];

       $mail = new PHPMailer(true);

       try {

              //Server settings
              $mail->isSMTP();                                            // Set mailer to use SMTP
              $mail->Host       = 'mail.lojarose.com.br';  // Specify main and backup SMTP servers
              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
              $mail->Username   = 'contato@lojarose.com.br';                     // SMTP username
              $mail->Password   = 'a8t4j5z8';                               // SMTP password
              $mail->Port       = 587;                                    // TCP port to connect to

              //Recipients
              $mail->setFrom($email, $nome);

              $mail->addAddress('contato@lojarose.com.br', 'Contato - Loja Rose');

              // Content
              $mail->isHTML(true);                                  // Set email format to HTML

              $mail->Subject = $assunto;
              
              $mail->Body    = '

              <html>

                     <head>

                            <meta charset="utf-8">

                     </head>

                     <body style="padding: 0px 100px; background-color: #ccc;" align="center">

                            <section style="background-color: white; margin-bottom: 5px;">

                                   <div align="center" style="width=100%; background-color: #2e2d2d;">

                                          <a href="https://www.lojarose.com.br">
                            
                                                 <img src="https://www.lojarose.com.br/img/logo/logo-fundo-branco.png" style="width: 200px; padding: 40px 0px;">
                            
                                          </a>

                                   </div>

                                   <div align="center" style="font-size: 20px; background-color: white; padding: 10px;">

                                          Nome: ' . $nome . '<br/>

                                          Telefone: ' . $telefone . '<br/>

                                          E-mail: ' . $email . '<br/>

                                          Assunto: ' . $assunto . '<br/>

                                          Mensagem: ' . $mensagem . '<br/>

                                   </div>

                            </section>

                            <span>Esse e-mail foi enviado automaticamente por favor não responda.</span>

                     </body>

              </html>
              

              ';

              $mail->AltBody = '';

              $mail->send();

              echo 1;

       } catch (Exception $e) {

              echo 2;

       }

?>