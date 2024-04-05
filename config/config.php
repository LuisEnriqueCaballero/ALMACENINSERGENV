<?php
class Conexion{
  private $servidor='localhost';
  private $namedatabase='db_insergenv';
  private $usuario='root';
  private $password='';

  public function Conectar(){
    $conectar=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->namedatabase);

    return $conectar;
  }
}
