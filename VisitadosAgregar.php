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

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="http://localhost/bitacora/Menu.html">Bitacora</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/bitacora/Consulta.php">Consultar Bitacora<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/bitacora/VisitaGuiada.html">Visita guiada</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="http://localhost/bitacora/Visitados.php">Visitados</a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <p>
<form name="form1" method="post" action="VisitadosAgregar.php" id="cdr">
<h2 style="text-align:center;"> Editar Personal</h2>
<p>
  <input  name="agrega" type"text" id="agrega" />
  <input type="submit" name="submit" value="Agregar" />
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
if($_SERVER['REQUEST_METHOD']=='POST'){
$agrega = utf8_decode($_POST['agrega']);
require_once('dbConnect.php');
$sql ="SELECT id FROM visitados ORDER BY Id ASC";
$res = mysqli_query($con,$sql);
$sql = "INSERT INTO visitados (Nombre) VALUES ('$agrega')";
if(mysqli_query($con,$sql)){
echo "registro correcto";
}
mysqli_close($con);
}else{
echo "Error";
}
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