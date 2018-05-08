<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$firma= $_POST['firma'];
$visitante = utf8_decode($_POST['visitante']);
$procedencia= utf8_decode($_POST['procedencia']);
$visitado = utf8_decode($_POST['visitado']);
$asunto= utf8_decode($_POST['asunto']);
require_once('dbConnect.php');
$sql ="SELECT id FROM registros ORDER BY id ASC";
$res = mysqli_query($con,$sql);
$id = 0;
while($row = mysqli_fetch_array($res)){
$id = $row['id'];
}
$path = "uploads/$id.png";
$actualpath = "localhost/bitacora/$path";
$sql = "INSERT INTO registros (firma,NVisitante,Procedencia,NVisitado,Asunto,Fecha,HoraE) VALUES ('$actualpath','$visitante','$procedencia','$visitado','$asunto',CURDATE(),current_time())";
if(mysqli_query($con,$sql)){
file_put_contents($path,base64_decode($firma));
echo $visitante." registrado correctamente";
}
mysqli_close($con);
}else{
echo "Error";
}