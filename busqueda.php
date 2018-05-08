<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aministrador</title>
<style type="text/css">
body{
color:#003B5C;
}
</style>

<p>
<form name="form1" method="post" action="busqueda.php" id="cdr">
<h2 style="text-align:center;"> <img src="logo.png" width="80" height="94" />Administrador Bitacora</h2>
<p>
  <input  name="busca" type"text" id="busqueda" />
  <input type="date" name="fechai" data-date-format="YYYY-MMMM-DD">
  <input type="date" name="fechaf" data-date-format="YYYY-MMMM-DD">
  <input type="submit" name="submit" value="Buscar" />
</p>
</p>
<p>&nbsp;</p>
</form>


<table width="1003" border="1">
  <tr>
    <th width="194" scope="col">Visitante</th>
    <th width="147" scope="col">Procedencia</th>
    <th width="193" scope="col">Visitado</th>
    <th width="150" scope="col">Asunto</th>
    <th width="90" scope="col">Fecha</th>
    <th width="94" scope="col">Hora Entrada</th>
    <th width="89" scope="col">Hora Salida</th>
  </tr>

<p>
 <?php
$busca="";
$fechai="";
$fechaf="";
$busca=$_POST['busca'];
$fechai=$_POST['fechai'];
$fechaf=$_POST['fechaf'];
$hostname_localhost ="localhost";  //nuestro servidor
$database_localhost ="bitacora";//Nombre de nuestra base de datos
$username_localhost ="root";//Nombre de usuario de nuestra base de datos (yo utilizo el valor por defecto)
$password_localhost ="";//Contraseña de nuestra base de datos (yo utilizo por defecto)
$localhost = @mysql_connect($hostname_localhost,$username_localhost,$password_localhost)//Conexión a nuestro servidor mysql
or
trigger_error(mysql_error(),E_USER_ERROR); //mensaaje de error si no se puede conectar
mysql_select_db($database_localhost, $localhost);//seleccion de la base de datos con la qu se desea trabajar
if($fechai=="" && $fechaf=="")
$query_search ="select * from registros where NVisitante like '%$busca%' or Procedencia like '%$busca%' or NVisitado like '%$busca%' or Asunto like '%$busca%' order by id ";
else if($busca=="")
$query_search ="select * from registros where Fecha >= '$fechai'  and Fecha <= '$fechaf' order by id ";
$query_exec = mysql_query($query_search) or die (mysql_error());
 
$enviar= array();
 
 if(mysql_num_rows($query_exec)){
  while ($row=mysql_fetch_assoc($query_exec)) {
   //$enviar[]=$row;
   echo '<tr>';
   echo '<td>'.utf8_encode($row['NVisitante']).'</td>';
   echo '<td>'.utf8_encode($row['Procedencia']).'</td>';
   echo '<td>'.utf8_encode($row['NVisitado']).'</td>';
   echo '<td>'.utf8_encode($row['Asunto']).'</td>';
   echo '<td>'.$row['Fecha'].'</td>';
   echo '<td>'.$row['HoraE'].'</td>';
   echo '<td>'.$row['HoraS'].'</td>';
  }
 }
mysql_close($localhost);
//cho json_encode($enviar);
?>
</table>
</p>
<p>&nbsp; </p>
