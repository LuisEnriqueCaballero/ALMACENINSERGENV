<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProveedor.php";

$proveedor =new MetodoProveedor();

echo $proveedor->DeleteProveedor($_POST['idProveedor']);