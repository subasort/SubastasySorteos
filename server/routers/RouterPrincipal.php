<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "cuenta":
            $routerCuenta = new RouterCuenta();
            return json_encode($routerCuenta->route());
            break;
         case "inscsorteo":
            $routerInscSorteo = new RouterInscSorteo();
            return json_encode($routerInscSorteo->route());
            break;
         case "inscsubasta":
            $routerInscSubasta = new RouterInscSubasta();
            return json_encode($routerInscSubasta->route());
            break;
         case "producto":
            $routerProducto = new RouterProducto();
            return json_encode($routerProducto->route());
            break;
         case "sorteo":
            $routerSorteo = new RouterSorteo();
            return json_encode($routerSorteo->route());
            break;
         case "subasta":
            $routerSubasta = new RouterSubasta();
            return json_encode($routerSubasta->route());
            break;
         case "tipocuenta":
            $routerTipoCuenta = new RouterTipoCuenta();
            return json_encode($routerTipoCuenta->route());
            break;
         case "usuario":
            $routerUsuario = new RouterUsuario();
            return json_encode($routerUsuario->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
