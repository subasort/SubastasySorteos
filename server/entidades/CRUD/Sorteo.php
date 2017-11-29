<?php
class Sorteo
{
   public $idSorteo;
   public $idProdSorteo;
   public $idGanaSorteo;
   public $fechaSorteo;
   public $precioBoleto;

   function __construct(int $idSorteo,int $idProdSorteo,int $idGanaSorteo,date $fechaSorteo,float $precioBoleto){
      $this->idSorteo = $idSorteo;
      $this->idProdSorteo = $idProdSorteo;
      $this->idGanaSorteo = $idGanaSorteo;
      $this->fechaSorteo = $fechaSorteo;
      $this->precioBoleto = $precioBoleto;
   }
}
?>