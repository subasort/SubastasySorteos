<?php
class TipoCuenta
{
   public $idTipoCuenta;
   public $descripcion;

   function __construct(int $idTipoCuenta,string $descripcion){
      $this->idTipoCuenta = $idTipoCuenta;
      $this->descripcion = $descripcion;
   }
}
?>