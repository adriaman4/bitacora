<?php
$hostname_localhost ="localhost";  //nuestro servidor
$database_localhost ="bitacora";//Nombre de nuestra base de datos
$username_localhost ="root";//Nombre de usuario de nuestra base de datos (yo utilizo el valor por defecto)
$password_localhost ="";//Contraseña de nuestra base de datos (yo utilizo por defecto)
$localhost = @mysql_connect($hostname_localhost,$username_localhost,$password_localhost)//Conexión a nuestro servidor mysql
or
trigger_error(mysql_error(),E_USER_ERROR); //mensaaje de error si no se puede conectar
mysql_select_db($database_localhost, $localhost);//seleccion de la base de datos con la qu se desea trabajar
$query_search ="select Nombre from visitados order by Nombre ASC";
$query_exec = mysql_query($query_search) or die (mysql_error());
 
$enviar= array();
 
 if(mysql_num_rows($query_exec)){
  while ($row=mysql_fetch_assoc($query_exec)) {
   $enviar[]=$row;
  }
 }
mysql_close($localhost);
echo json_encode($enviar);
?>