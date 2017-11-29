<?php
class Producto
{
   public $idProducto;
   public $nomProducto;
   public $descProducto;
   public $precioCompra;

   function __construct(int $idProducto,string $nomProducto,string $descProducto,string $precioCompra){
      $this->idProducto = $idProducto;
      $this->nomProducto = $nomProducto;
      $this->descProducto = $descProducto;
      $this->precioCompra = $precioCompra;
   }
}
?>