<?php
class InscSubasta
{
   public $idInscSub;
   public $idSubasta;
   public $idUsuario;

   function __construct(int $idInscSub,int $idSubasta,int $idUsuario){
      $this->idInscSub = $idInscSub;
      $this->idSubasta = $idSubasta;
      $this->idUsuario = $idUsuario;
   }
}
?>