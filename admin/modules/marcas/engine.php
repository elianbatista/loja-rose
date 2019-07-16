<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $tipo = $_GET['tipo'];

       $nomeModulo = 'marcas';

       if($tipo == 'adicionar'){

              $nomeMarca = $_POST['nome'];

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

              $adicionarCategoria = $mysqli->query('INSERT INTO `marcas`
              
              (

                     `nome`,

                     `imagem`

              )

              VALUES

              (

                     "' . $nomeMarca . '",

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

              $buscarMarca = $mysqli->query('SELECT * FROM `marcas` WHERE `id` = ' . $id);

              $marca = $buscarMarca->fetch_object();

              $nomeMarca = $_POST['nome'];

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
                         $novoNome = $marca->imagem;
                  
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


              $editarCategoria = $mysqli->query('UPDATE `marcas` SET
              
                     `nome` = "' . $nomeMarca . '"

              WHERE `id` = ' . $id);

              if($editarCategoria){

                     echo 1;
                     
              } else {

                     echo 2;

              }
              
       }

?>