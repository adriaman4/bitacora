<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
require_once('dbConnect.php');
$CERO="0";
$sql ="UPDATE registros SET HoraS= 1 WHERE HoraS='$CERO' AND Fecha < CURDATE()";
$res = mysqli_query($con,$sql);
if($res){
	echo "Registro actualizado";
}else{
	echo"Registro no actualizado";
}
mysqli_close($con);
}else{
echo "Error";
}
