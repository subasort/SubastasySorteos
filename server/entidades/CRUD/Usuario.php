<?php
class Usuario
{
   public $idUsuario;
   public $ciUsuario;
   public $nombreUsuario;
   public $apellidoUsuario;
   public $direccionUsuario;
   public $telfUsuario;
   public $correoUsuario;

   function __construct(int $idUsuario,string $ciUsuario,string $nombreUsuario,string $apellidoUsuario,string $direccionUsuario,string $telfUsuario,string $correoUsuario){
      $this->idUsuario = $idUsuario;
      $this->ciUsuario = $ciUsuario;
      $this->nombreUsuario = $nombreUsuario;
      $this->apellidoUsuario = $apellidoUsuario;
      $this->direccionUsuario = $direccionUsuario;
      $this->telfUsuario = $telfUsuario;
      $this->correoUsuario = $correoUsuario;
   }
}
?>