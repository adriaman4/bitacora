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
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/bitacora/Consulta.php">Consultar Bitacora<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/bitacora/VisitaGuiada.php">Visita guiada</a>
          </li>
          <li class="nav-item active">
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
          <center><img class="mb-4" src="lns_azul_claro.png" alt="" width="199" height="59">
<img class="mb-4" src="escudobuap.png" alt="" width="161" height="72">
</center>
          <form name="form1" method="post" action="Visitados.php" id="cdr">
 <center>
<h2 style="text-align:center;"> Editar Personal</h2>
<p>
  <input  name="agrega" type"text" id="agrega" placeholder="nombre a agregar" />
  <input type="submit" name="agregar" value="Agregar Persona" />
  <br></br>
  <input  name="elimina" type"text" id="elimina" placeholder="nombre a eliminar" />
  <input type="submit" name="borrar" value="Borrar Persona" />
</p>
</form>

</p>
        </div>
        <table width="1003" border="1">
  <tr>
    <th width="194" scope="col">Personal</th>
  </tr>

<p>
 <?php
$hostname_localhost ="localhost";  //nuestro servidor
$database_localhost ="bitacora";//Nombre de nuestra base de datos
$username_localhost ="root";//Nombre de usuario de nuestra base de datos (yo utilizo el valor por defecto)
$password_localhost ="";//Contraseña de nuestra base de datos (yo utilizo por defecto)
$localhost = @mysql_connect($hostname_localhost,$username_localhost,$password_localhost)//Conexión a nuestro servidor mysql
or
trigger_error(mysql_error(),E_USER_ERROR); //mensaaje de error si no se puede conectar
mysql_select_db($database_localhost, $localhost);//seleccion de la base de datos con la qu se desea trabajar
$query_search ="select * from visitados order by Nombre ASC";
$query_exec = mysql_query($query_search) or die (mysql_error());
 
$enviar= array();
 
 if(mysql_num_rows($query_exec)){
  while ($row=mysql_fetch_assoc($query_exec)) {
   //$enviar[]=$row;
   echo '<tr>';
   echo '<td>'.utf8_encode($row['Nombre']).'</td>';
  }
 }
mysql_close($localhost);
if (isset($_POST['agregar'])) {
	if($_POST['agrega']!=""){
		$agrega = utf8_decode($_POST['agrega']);
		require_once('dbConnect.php');
		$sql = "INSERT INTO visitados (Nombre) VALUES ('$agrega')";
		if(mysqli_query($con,$sql)){
			echo "Persona Agregada";
		}
		mysqli_close($con);
		}else{
		echo "Ingrese un nombre";
		}	
	} //fin if agregar
if (isset($_POST['borrar'])) {
	$agrega = utf8_decode($_POST['elimina']);
	if($agrega!="" && $agrega!="Otros"){
		
		require_once('dbConnect.php');
		$sql = "DELETE FROM visitados WHERE Nombre='$agrega'";
		if(mysqli_query($con,$sql))
			if(mysqli_affected_rows($con)>0)
				echo "Persona Borrada ";
			else
				echo "Persona No esta en la BD ";
		else
			echo "No se pede conectar a la BD";
		mysqli_close($con);
		}else{
		echo "Ingrese un nombre que no sea Otros ";
		}		
	} //fin if borrar
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