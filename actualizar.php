<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$visitante = (int)$_POST['visitante'];
require_once('dbConnect.php');
$sql ="UPDATE registros SET HoraS = current_time() WHERE id = '$visitante'";
$res = mysqli_query($con,$sql);
if($res){
	echo "Salida Registrada";
}else{
	echo"no";
}
mysqli_close($con);
}else{
echo "Error";
}
