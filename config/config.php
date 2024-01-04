<?php
class Conexion{
  private $servidor='localhost';
  private $namedatabase='nuevo_dbinsergenv';
  private $usuario='root';
  private $password='';

  public function Conectar(){
    $conectar=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->namedatabase);

    return $conectar;
  }
}
