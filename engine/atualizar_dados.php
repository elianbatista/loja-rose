<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $buscarCliente = $mysqli->query('SELECT * FROM `clientes` WHERE `id` = "' . $_SESSION['id'] . '"');

       $cliente = $buscarCliente->fetch_object();

       $nome = addslashes(trim($_POST['nome']));

       $cpf = addslashes(trim($_POST['cpf']));

       $razao_social = addslashes(trim($_POST['razao_social']));

       $inscricao_estadual = addslashes(trim($_POST['inscricao_estadual']));

       $cnpj = addslashes(trim($_POST['cnpj']));

       $telefone = addslashes(trim($_POST['telefone']));

       $telefone2 = addslashes(trim($_POST['telefone2']));

       $nascimento = addslashes(trim($_POST['data_nascimento']));

       $email = addslashes(trim($_POST['email']));

       if($_POST['senha'] == ''){

              $senha = $cliente->senha;
              
       } else {

              $senha = addslashes(trim(md5(sha1($_POST['senha']))));

       }

       $cep = addslashes(trim($_POST['cep']));

       $rua = addslashes(trim($_POST['rua']));

       $numero = addslashes(trim($_POST['numero']));

       $bairro = addslashes(trim($_POST['bairro']));

       $estado = addslashes(trim($_POST['estado']));

       $cidade = addslashes(trim($_POST['cidade']));

       $complemento = addslashes(trim($_POST['complemento']));

       $referencia = addslashes(trim($_POST['referencia']));

       $atualizarDados = $mysqli->query('UPDATE `clientes` SET
       
              `nome` = "' . $nome . '",

              `cpf` = "' . $cpf . '",

              `telefone` = "' . $telefone . '",

              `telefone2` = "' . $telefone2 . '",

              `nascimento` = "' . $nascimento . '",

              `razao_social` = "' . $razao_social . '",

              `cnpj` = "' . $cnpj . '",

              `inscricao_estadual` = "' . $inscricao_estadual . '",

              `email` = "' . $email . '",

              `senha` = "' . $senha . '",

              `cep` = "' . $cep . '",

              `rua` = "' . $rua . '",

              `bairro` = "' . $bairro . '",

              `uf` = "' . $estado . '",

              `cidade` = "' . $cidade . '",

              `complemento` = "' . $complemento . '",

              `referencia` = "' . $referencia . '",

              `numero` = "' . $numero . '"

              WHERE `id` = "' . $_SESSION['id'] . '"');

       if($atualizarDados){

              echo 1;

       } else {

              echo 2;

       }