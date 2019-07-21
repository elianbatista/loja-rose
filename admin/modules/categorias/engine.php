<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $tipo = $_GET['tipo'];

       if($tipo == 'adicionar'){

              $titulo = $_POST['titulo'];

              $sub_categoria = $_POST['sub_categoria'];

              $categoria_pai = $_POST['categoria_pai'];

              $adicionarCategoria = $mysqli->query('INSERT INTO `categorias`
              
              (

                     `titulo`,

                     `sub_categoria`,

                     `categoria_pai`,

                     `tags`


              )

              VALUES

              (

                     "' . $titulo . '",

                     "' . $sub_categoria . '",

                     "' . $categoria_pai . '",

                     "' . $tags . '"

              )

              ');

              if($adicionarCategoria){

                     echo 1;

              } else {

                     echo 0;
                     
              }

       } else if($tipo == 'editar'){

              $id = $_GET['id'];

              $titulo = $_POST['titulo'];

              $sub_categoria = $_POST['sub_categoria'];

              $categoria_pai = $_POST['categoria_pai'];

              $tags = $_POST['tags'];

              $editarCategoria = $mysqli->query('UPDATE `categorias` SET
              
                     `titulo` = "' . $titulo . '",

                     `sub_categoria` = "' . $sub_categoria . '",

                     `categoria_pai` = "' . $categoria_pai . '",

                     `tags` = "' . $tags . '"

              WHERE `id` = ' . $id);

              if($editarCategoria){

                     echo 1;
                     
              } else {

                     echo 2;

              }
              
       }

?>