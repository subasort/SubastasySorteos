<?php
     $mensaje = '
               <h3 align="center"> SUBASORT le  agradece por leer este mensaje</h3><br><br>
               <h3 align="center"><picture>
               <source media="(min-width: )" srcset="subasort.png">
               <img src="http://subasort01.byethost24.com/imagen/subasort.png" width="200">
               </picture><br></h3>';
    
    $para = 'lsalazar@superioraloasi.edu.ec;lsalazar@yavirac.edu.ec;'
    $cabeceras = 'MIME-Version: 1.0'."\r\n";
    $cabeceras = 'Content-type: text/html; charset=iso-8859-1'."\r\n";

    $tipocorreos=explode('@',$para);
    ############
    $para=trim($para);
    $nletra=strlen($para);
    $correo='';
    $n=1;

    for ($x=0;$x < $nletra; $x++){
        if($para[$x]==';')¨{
            $n++;
            $vcorreo[$n]=$correo;
            $correo='';
        }else{
            $correo=$correo.$para[$x];
        }
    }

    foreach ($vcorreo as $mail){
        $titulo = "este es el mensaje enviado de prueba subasort";
        $cabeceras = 'MINE-Version: 1.0'. "\r\n";
        $cabeceras = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    }