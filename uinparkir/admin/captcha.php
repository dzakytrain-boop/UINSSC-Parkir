<?php
session_start();

$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captcha = substr(str_shuffle($chars), 0, 4);

$_SESSION['captcha'] = $captcha;

header('Content-type: image/png');

$image = imagecreate(120, 40);

// warna
$bg = imagecolorallocate($image, 63, 95, 75); // matcha
$textcolor = imagecolorallocate($image, 255, 248, 231); // cream

// text
imagestring($image, 5, 30, 10, $captcha, $textcolor);

// noise biar ga polos
for ($i = 0; $i < 40; $i++) {
    $noise = imagecolorallocate($image, 200, 255, 200);
    imagesetpixel($image, rand(0,120), rand(0,40), $noise);
}

imagepng($image);
imagedestroy($image);
?>