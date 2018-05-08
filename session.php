
<?php

session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "bitacora";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}else{
	
$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT Id FROM $tbl_name WHERE Usuario = '$username' and Contraseña = '$password'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 $row = $result->fetch_array(MYSQLI_ASSOC); 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    header ("Location: http://localhost/bitacora/Menu.html");
	} else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='Entrar.html'>Volver a Intentarlo</a>";
 }
}
 mysqli_close($conexion); 
 ?>
