<?php include 'Vigenere.php';                                 //Incluyo la clase $mensaje   = $_POST['mensaje'];                 //Mensaje a cifrar $semilla   = $_POST['semilla'];                 //Semilla o palabra con la que se cifrara/descifrara el mensaje $tarea     = $_POST['tarea'];                   //Boton pulsado por el usuario $salida    = "";                                                //Variable que guarda el mensaje //Aqui esta la magia if($_POST && $mensaje != "" && $semilla != ""){ //CIFRADO DEL MENSAJE if($_POST['tarea'] == "Cifrar"){ $cipher    = new Vigenere($mensaje, $semilla); $salida = $cipher->encode();
}
//DESCIFRADO DEL MENSAJE
if($_POST['tarea'] == "DesCifrar"){
$cipher    = new Vigenere($mensaje, $semilla);
$salida = $cipher->decode();
}
}
?>
<html>
<head>
<title> .:: Implementacion de la cifra de vigenere ::. </title>
</head>
<body>

<h1>Vigenere</h1>
<hr>

<!-- Datos para el cifrado -->

<form method="post">
<strong>Mensaje a cifrar / descifrar :</strong> 
<textarea name="mensaje" style="width:500px;border:1px solid #555"><?php echo $_POST['mensaje']; ?></textarea>
<strong>Semilla :</strong>
<input type="text" name="semilla" style="width:150px;border:1px solid #555" value="<?php echo $_POST['semilla']; ?>"> |
<input type="submit" name="tarea" value="Cifrar"> |
<input type="submit" name="tarea" value="DesCifrar">
</form>

<?php
//Muestro el mensaje de salida
if($salida != ""){
echo "<strong> Resultado del criptograma </strong> 
 \n";
echo "
<div class='mensaje'>" . $salida . "</div>

";
}
?>
</body>
</html>