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
          <li class="nav-item active">
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
          <form id='f1' action='http://localhost/bitacora/VisitaGuiada.php' method="post">
        <center>
        <img class="mb-4" src="lns_azul_claro.png" alt="" width="191" height="59">
<img class="mb-4" src="escudobuap.png" alt="" width="153" height="72">

            <table width=" " height=" " border="1"   CELLSPACING="0">
                <tr>
                    <td COLSPAN="3" ALIGN="center">Guardar Nombres de Visitantes</td>
                </tr>
 
                <tr>
                    <td>
                archivo
                    <input type='file' name='f' value='ingresa tu archivo'/><br/>
                    </td>
                    <td>
                Procedencia
                    <input type='text' name='d' value='Buap'/>
                    <input type='submit' value='cargar'/>
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            
            
        </center>      
    </form>
    
    <?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nom=$_POST['f'];
		$procedencia=$_POST['d'];
		$fp=fopen($nom,'r');
		if(!$fp){
			echo "Error al cargar archivo";
		}
		require_once('dbConnect.php');
		$con->set_charset('utf8');
		$firma=utf8_decode("Sin firma");
		$visitado = utf8_decode("Laboratorio LNS");
		$asunto= utf8_decode("Visita guiada");
		$dos="2";
		$loop=0;
		while(!feof($fp)){
			$loop++;
			$line=fgets($fp);
			echo '
			<div>
			<div>Nombre: '.utf8_encode($line).'</div>
			</div>
			';
			$visitante=utf8_encode($line);
			$sql = "INSERT INTO registros 			(firma,NVisitante,Procedencia,NVisitado,Asunto,Fecha,HoraE,HoraS) VALUES ('$firma','$visitante','$procedencia','$visitado','$asunto',CURDATE(),current_time(),ADDTIME(current_time(),'02:00:00'))";
			if(mysqli_query($con,$sql)){
			echo "registro correcto";
			}else{
				echo "no";
			}
			$fp++;
			}
mysqli_close($con);
	}

?>	
            
            
        </div>
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
