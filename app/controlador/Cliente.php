<?php
include_once  "../app/persistencia/ClienteApp.php";





$cliente = new ClienteApp();
$showCliente = $cliente->buscarCliente($_SESSION['id_cliente']);




