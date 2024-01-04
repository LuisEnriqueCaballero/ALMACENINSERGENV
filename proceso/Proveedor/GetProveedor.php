<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProveedor.php";

$proveedor =new MetodoProveedor();

echo json_encode($proveedor->GetProveedor($_POST['id']));