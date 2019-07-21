<?php

       require_once('connect.php');

       session_start();

       if(!isset($_SESSION['id'])){

              header('Location: /cliente/login');

       }

       $id_pedido = $_POST['codigo'];

       $observacao = $_POST['observacao'];

       $tipo_transacao = $_POST['tipo_transacao'];

       if($tipo_transacao == 1){

              $status = 2; //PAGAMENTO NO LOCAL OU PAGAMENTO EFETUADO
              
       } else {

              $status = 1; //AGUARDANDO PAGAMENTO

       }

       $atualizarPedido = $mysqli->query('UPDATE `pedidos` SET 
       
       `observacao` = "' . $observacao . '",

       `tipo_transacao` = "' . $tipo_transacao . '",

       `status` = "' . $status . '"
       
       WHERE `id` = "' . $id_pedido . '"');

       if($atualizarPedido){

              if($tipo_transacao == 2){

                     $buscarCompras = $mysqli->query('SELECT * FROM `compras` WHERE `id_pedido` = "' . $id_pedido . '"');

                     $data['token'] = '4e455606-41a0-4c1f-8681-17042a77240fbd902b83453cb932f3aaf566d1042d6c6b2a-c1c5-461d-90d4-82e2b2a52682';
                     //$data['token'] = '770719D5C17846F0A6B11D3C53DDDE50';
                     $data['email'] = 'elianlbatista2000@gmail.com';
                     $data['currency'] = 'BRL';

                     $cont = 1;

                     while($compra = $buscarCompras->fetch_object()){

                            $buscarProduto = $mysqli->query('SELECT * FROM `produtos` WHERE `id` = ' . $compra->id_produto);

                            $produto = $buscarProduto->fetch_object();

                            $preco = str_replace('.', ',', $produto->preco);

                            $preco = str_replace(',', '.', $produto->preco);

                            $casasDecimais = strstr($preco, '.');

                            if(strlen($casasDecimais) == 0){

                                   $preco .= '.00';

                            } else if(strlen($casasDecimais) == 2){

                                   $preco .= '0';

                            }

                            $data['itemId' . $cont] = $produto->id;
                            $data['itemQuantity' . $cont] = $compra->quantidade;
                            $data['itemDescription' . $cont] = $produto->nome;
                            $data['itemAmount' . $cont] = $preco;

                            $cont++;

                     }

                     $url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

                     $data = http_build_query($data);

                     $curl = curl_init($url);

                     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                     curl_setopt($curl, CURLOPT_POST, true);
                     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                     curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

                     $xml = curl_exec($curl);

                     curl_close($curl);

                     $xml = simplexml_load_string($xml);

                     echo $xml->code;

              } else {

                     echo 1;

              }

       }

       

?>