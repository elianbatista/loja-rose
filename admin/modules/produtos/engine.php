<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $tipo = $_GET['tipo'];

       $nomeModulo = 'produtos';

       if($tipo == 'adicionar'){

              $nomeProduto = addslashes(trim($_POST['nome']));

              $quantidade_estoque = addslashes(trim($_POST['quantidade_estoque']));

              $descricao_produto = addslashes(trim($_POST['descricao_produto']));

              $categoria = addslashes(trim($_POST['categoria']));

              $marca = addslashes(trim($_POST['marca']));

              $preco = addslashes(trim($_POST['preco']));

              $tamanho = addslashes(trim($_POST['tamanho']));

              if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
                  
                     $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];

                     $nome = $_FILES[ 'imagem' ][ 'name' ];
                  
                     // Pega a extensão
                     $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                  
                     // Converte a extensão para minúsculo
                     $extensao = strtolower ( $extensao );
                  
                     // Somente imagens, .jpg;.jpeg;.gif;.png
                     // Aqui eu enfileiro as extensões permitidas e separo por ';'
                     // Isso serve apenas para eu poder pesquisar dentro desta String
                     if ( strstr ( '.jpg;.jpeg;.png', $extensao ) ) {
                         // Cria um nome único para esta imagem
                         // Evita que duplique as imagens no servidor.
                         // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                         $novoNome = uniqid ( time () ) . '.' . $extensao;
                  
                         // Concatena a pasta com o nome

                         $destino = '../../imagens/';

                         if(is_dir($destino . $nomeModulo)){

                            $destino .= $nomeModulo . '/';

                         } else {

                            mkdir($destino . $nomeModulo);

                            $destino .= $nomeModulo . '/';

                         }

                         $destino .= $novoNome;
                  
                         // tenta mover o arquivo para o destino
                         if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                         }
                         else
                             echo 'Erro ao salvar o arquivo';
                     }
                     else
                         echo 'Formato não Permitido';
              }

              $adicionarCategoria = $mysqli->query('INSERT INTO `produtos`
              
              (

                     `nome`,

                     `quantidade_estoque`,

                     `descricao_produto`,

                     `preco`,

                     `tamanho`,

                     `categoria`,

                     `marca`,

                     `imagem`

              )

              VALUES

              (

                     "' . $nomeProduto . '",

                     "' . $quantidade_estoque . '",

                     "' . $descricao_produto . '",

                     "' . $preco . '",

                     "' . $tamanho . '",

                     "' . $categoria . '",

                     "' . $marca . '",

                     "' . $novoNome . '"

              )

              ');

              if($adicionarCategoria){

                     echo 1;

              } else {

                     echo 0;
                     
              }

       } else if($tipo == 'editar'){

              $id = $_GET['id'];

              $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $id);

              $produto = $buscarProduto->fetch_object();

              $nomeProduto = addslashes(trim($_POST['nome']));

              $quantidade_estoque = addslashes(trim($_POST['quantidade_estoque']));

              $descricao_produto = addslashes(trim($_POST['descricao_produto']));

              $categoria = addslashes(trim($_POST['categoria']));

              $marca = addslashes(trim($_POST['marca']));

              $preco = addslashes(trim($_POST['preco']));

              $tamanho = addslashes(trim($_POST['tamanho']));

              if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
                  
                     $arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];

                     $nome = $_FILES[ 'imagem' ][ 'name' ];
                  
                     // Pega a extensão
                     $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                  
                     // Converte a extensão para minúsculo
                     $extensao = strtolower ( $extensao );
                  
                     // Somente imagens, .jpg;.jpeg;.gif;.png
                     // Aqui eu enfileiro as extensões permitidas e separo por ';'
                     // Isso serve apenas para eu poder pesquisar dentro desta String
                     if ( strstr ( '.jpg;.jpeg;.png', $extensao ) ) {
                         // Cria um nome único para esta imagem
                         // Evita que duplique as imagens no servidor.
                         // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                         $novoNome = $produto->imagem;
                  
                         // Concatena a pasta com o nome

                         $destino = '../../imagens/';

                         if(is_dir($destino . $nomeModulo)){

                            $destino .= $nomeModulo . '/';

                         } else {

                            mkdir($destino . $nomeModulo);

                            $destino .= $nomeModulo . '/';

                         }

                         $destino .= $novoNome;
                  
                         // tenta mover o arquivo para o destino
                         if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                         }
                         else
                             echo 'Erro ao salvar o arquivo';
                     }
                     else
                         echo 'Formato não Permitido';
              }

              $editarCategoria = $mysqli->query('UPDATE `produtos` SET

                     `nome` = "' . $nomeProduto . '",

                     `quantidade_estoque` = "' . $quantidade_estoque . '",

                     `descricao_produto` = "' . $descricao_produto . '",

                     `preco` = "' . $preco . '",

                     `tamanho` = "' . $tamanho . '",

                     `categoria` = "' . $categoria . '",

                     `marca` = "' . $marca . '"        

              WHERE `id` = ' . $id);

              if($editarCategoria){

                     echo 1;
                     
              } else {

                     echo 2;

              }
              
       }

?>