<?php
class Subasta
{
   public $idSubasta;
   public $idProdSubasta;
   public $idGanaSubasta;
   public $fechaSubasta;
   public $montoMinimo;

   function __construct(int $idSubasta,int $idProdSubasta,int $idGanaSubasta,date $fechaSubasta,float $montoMinimo){
      $this->idSubasta = $idSubasta;
      $this->idProdSubasta = $idProdSubasta;
      $this->idGanaSubasta = $idGanaSubasta;
      $this->fechaSubasta = $fechaSubasta;
      $this->montoMinimo = $montoMinimo;
   }
}
?>