<?php
class InscSorteo
{
   public $idInscSorteo;
   public $idSorteo;
   public $idUsuario;

   function __construct(int $idInscSorteo,int $idSorteo,int $idUsuario){
      $this->idInscSorteo = $idInscSorteo;
      $this->idSorteo = $idSorteo;
      $this->idUsuario = $idUsuario;
   }
}
?>