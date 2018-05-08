<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="lns_azul_claro.png">

    <title>Administracion de Bitacora</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <a class="navbar-brand" href="http://localhost/bitacora/Menu.html">Bitacora LNS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/bitacora/Consulta.php">Consultar Bitacora<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/bitacora/VisitaGuiada.php">Visita guiada</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/bitacora/Visitados.php">Personal</a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <p>
<form name="form1" method="post" action="Consulta.php" id="cdr">
<center><img class="mb-4" src="lns_azul_claro.png" alt="" width="199" height="59">
<img class="mb-4" src="escudobuap.png" alt="" width="161" height="72">
<h2 style="text-align:center;"> Consultar Bitacora</h2>
<p>
  
  <input  name="busca" type"text" placeholder="Ingrese busqueda"  id="busqueda" />
  <p><input type="radio" name="check" id="check" value="check">

<label for="mujer">Mostrar usuarios que no registraron salida </label>

</p>
  <p>Fecha Inicio:
  <input type="date" name="fechai" data-date-format="YYYY-MMMM-DD" value="<?php echo date("Y-m-d");?>">
  Fecha Final:
  <input type="date" name="fechaf" data-date-format="YYYY-MMMM-DD" value="<?php echo date("Y-m-d");?>">
  </p>
  <input type="submit" name="submit" value="Consultar" />
</p>
</p>
        </div>
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
if($_SERVER['REQUEST_METHOD']=='POST')
{
$busca=$_POST['busca'];
$fechai=$_POST['fechai'];
$fechaf=$_POST['fechaf'];
}
$hostname_localhost ="localhost";  //nuestro servidor
$database_localhost ="bitacora";//Nombre de nuestra base de datos
$username_localhost ="root";//Nombre de usuario de nuestra base de datos (yo utilizo el valor por defecto)
$password_localhost ="";//Contraseña de nuestra base de datos (yo utilizo por defecto)
$localhost = @mysql_connect($hostname_localhost,$username_localhost,$password_localhost)//Conexión a nuestro servidor mysql
or
trigger_error(mysql_error(),E_USER_ERROR); //mensaaje de error si no se puede conectar
mysql_select_db($database_localhost, $localhost);//seleccion de la base de datos con la qu se desea trabajar
if(isset($_POST["check"]))
{
	$query_search ="select * from registros where HoraS=1";
}else{
if($fechai==date("Y-m-d") && $fechaf==date("Y-m-d"))
$query_search ="select * from registros where NVisitante like '%$busca%' or Procedencia like '%$busca%' or NVisitado like '%$busca%' or Asunto like '%$busca%' order by id ";
else if($busca=="")
$query_search ="select * from registros where Fecha >= '$fechai'  and Fecha <= '$fechaf' order by id ";
else
$query_search="select * from registros where Fecha >= '$fechai'  and Fecha <= '$fechaf' and NVisitante like '%$busca%' or Procedencia like '%$busca%' or NVisitado like '%$busca%' or Asunto like '%$busca%' order by id ";
}
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
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          
        </div>

        <hr>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>Bitacora <strong>Laboratorio Nacional de Supercómputo</strong> del Sureste de México</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
