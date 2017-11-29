<?php
class Cuenta
{
   public $idCuenta;
   public $idUsuario;
   public $contrasena;
   public $idTipoCuenta;

   function __construct(int $idCuenta,int $idUsuario,string $contrasena,int $idTipoCuenta){
      $this->idCuenta = $idCuenta;
      $this->idUsuario = $idUsuario;
      $this->contrasena = $contrasena;
      $this->idTipoCuenta = $idTipoCuenta;
   }
}
?>