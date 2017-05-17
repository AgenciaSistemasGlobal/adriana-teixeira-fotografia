<?php
#recebendo a url da imagem
$filename = "uploads/" . $_GET["img"];

#Cabeçalho que ira definir a saida da pagina
header("Content-type: image/jpeg");

#pegando as dimensoes reais da imagem, largura e altura
list($width, $height) = getimagesize($filename);

#setando a largura da miniatura
$new_width = $_GET["width"];
#setando a altura da miniatura
$new_height = $_GET["height"];

#gerando a a miniatura da imagem
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

#o 3º argumento é a qualidade da miniatura de 0 a 100
imagejpeg($image_p, null, 50);
imagedestroy($image_p);
?>