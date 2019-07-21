<?php

       require_once('../../engine/config.php');

       require_once('../../../engine/connect.php');

       $id = $_POST['pedido'];

       $status = intval($_POST['status']) + 1;

       $alterarStatus = $mysqli->query('UPDATE `pedidos` SET `status` = "' . $status . '" WHERE `id` = "' . $id . '"');

       if($alterarStatus){

              echo $id;

       }

?>