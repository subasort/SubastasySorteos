<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hacer s</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>
   <?
    if (!$db_connection) {
        die('No se ha podido conectar a la base de datos');
    }
    
    $subs_email = $_POST['Direccion de Correo'];
    $subs_nombre = $_POST['Nombre Completo'];
    $subs_facebook = $_POST['Perfil Facebook'];
    
    $resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'", $db_connection);
    
    if (mysql_num_rows($resultado)>0)
    {
    
    header('Location: fail.html');
    
    } else {
    
        $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`email` , `nombre` , `facebook`) VALUES ("' . $subs_email . '", "' . $subs_nombre . '", "' . $subs_facebook . '")';
    
    mysql_select_db($db_name, $db_connection);
    $retry_value = mysql_query($insert_value, $db_connection);
    
    if (!$retry_value) {
       die('Error: ' . mysql_error());
    }
    
    header('Location: sucess.html');
    }
    
    mysql_close($db_connection);


    
