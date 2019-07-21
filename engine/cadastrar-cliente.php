<?php

       require_once('connect.php');

       session_start();

       $pessoa = addslashes(trim($_POST['pessoa']));

       $nome = addslashes(trim($_POST['nome']));

       $cpf = addslashes(trim($_POST['cpf']));

       $razao_social = addslashes(trim($_POST['razao_social']));

       $inscricao_estadual = addslashes(trim($_POST['inscricao_estadual']));

       $cnpj = addslashes(trim($_POST['cnpj']));

       $telefone = addslashes(trim($_POST['telefone']));

       $telefone2 = addslashes(trim($_POST['telefone2']));

       $data_nascimento = addslashes(trim($_POST['data_nascimento']));

       $email = addslashes(trim($_POST['email']));

       $senha = addslashes(trim(md5(sha1($_POST['senha']))));

       $cep = addslashes(trim($_POST['cep']));

       $rua = addslashes(trim($_POST['rua']));

       $numero = addslashes(trim($_POST['numero']));

       $bairro = addslashes(trim($_POST['bairro']));

       $estado = addslashes(trim($_POST['estado']));

       $cidade = addslashes(trim($_POST['cidade']));

       $complemento = addslashes(trim($_POST['complemento']));

       $referencia = addslashes(trim($_POST['referencia']));

       $adicionarCliente = $mysqli->query('INSERT INTO `clientes`
       
       (

              `nome`,
              
              `cpf`,

              `telefone`,

              `telefone2`,

              `nascimento`,
              
              `razao_social`,

              `cnpj`,

              `inscricao_estadual`,

              `email`,

              `senha`,

              `cep`,

              `rua`,

              `bairro`,

              `uf`,

              `cidade`,

              `complemento`,

              `referencia`,

              `numero`

       )

       VALUES

       (

              "' . $nome . '",

              "' . $cpf . '",

              "' . $telefone . '",

              "' . $telefone2 . '",

              "' . $data_nascimento . '",

              "' . $razao_social . '",

              "' . $cnpj . '",

              "' . $inscricao_estadual . '",

              "' . $email . '",

              "' . $senha . '",

              "' . $cep . '",

              "' . $rua . '",

              "' . $bairro . '",

              "' . $estado . '",

              "' . $cidade . '",

              "' . $complemento . '",

              "' . $referencia . '",

              "' . $numero . '"

       )

       ');

       if($adicionarCliente){

              echo 1;

              $_SESSION['id'] = $mysqli->insert_id;

              $_SESSION['tipo'] = "Cliente";

              $_SESSION['nome'] = $nome;

       } else {

              echo 2;

       }


?>