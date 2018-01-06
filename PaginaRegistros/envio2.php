<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>correo envio</title>
</head>

<body>

<?php
     $mensaje = '
               <h3 align="center"> SUBASORT le  agradece por leer este mensaje</h3><br><br>
               <h3 align="center"><br>... gracias</h3>';
    
        $para = 'juanitoalcachofas108@gmail.com;';
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $tipocorreos=explode('@',$para);
        ############
        $para=trim($para);
        $nletra=strlen($para);
        $correo='';
        $n=1;

        for ($x=0;$x < $nletra; $x++){
            if($para[$x]==';'){
                $n++;
                $vcorreo[$n]=$correo;
                $correo='';
            }else{
            $correo=$correo.$para[$x];
           }
        }

        foreach ($vcorreo as $mail){
            $titulo = "este es el mensaje enviado de prueba subasort";
            $cabeceras = 'MIME-Version: 1.0'. "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

            $tipocorreos=explode('@',$mail);
            if($tipocorreos['1']=='gmail.com'){
               $cabeceras .= "From: Admin"."\r\n" ;
            }else{
               $cabeceras .= 'From: administrador <hellboy3.0@hotmail.com>' . "\r\n";
            }
            mail($mail, $titulo, $mensaje, $cabeseras);
            echo $mail.', Correo enviado con exito<br>';

        }
?>
</body>
</html>
