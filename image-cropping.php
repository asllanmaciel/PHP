<?php

$novo_nome = $novo_full = '';  
$site_url = get_bloginfo('wpurl');
//$path_img = str_replace($site_url, "", $item->foto);
$path_img  = parse_url($item->foto);

$path_parts = pathinfo($path_img['path']);

$novo_nome = $path_parts["filename"].'-cropped.'.$path_parts["extension"];
$novo_full = 'img/avatars/'.$novo_nome;


if (!file_exists('$novo_full')) {
    //$img = imagecreatefromjpeg();

    if(preg_match('/\.(png)$/i', $site_url.$path_img['path']) || isPNG($site_url.$path_img['path'])){
        $img = imagecreatefrompng($site_url.$path_img['path']);
    }else{
        $img = imagecreatefromjpeg($site_url.$path_img['path']);
    }

    /*
    // (B) CROP AREA
    $area = [
    // STARTING POSITON - 0,0 IS TOP LEFT CORNER
    "x" => 0, "y" => 0,
    // NUMBER OF PIXELS TO CROP
    "width" => 40, "height" => 40
    ];
    */

    $tocrop = 0.8; // CROP 50% FROM CENTER
    $swidth = imagesx($img); // SOURCE WIDTH
    $sheight = imagesy($img); // SOURCE HEIGHT
    $cwidth = ceil($swidth * $tocrop); // CROPPED WIDTH
    $cheight = ceil($sheight * $tocrop); // CROPPED HEIGHT
    $sx = ceil(($swidth / 2) - ($cwidth / 2)); // SOURCE X COORD
    $sy = ceil(($sheight / 2) - ($cheight / 2)); // SOURCE Y COORD
    $area = ["x" => $sx, "y" => $sy, "width" => $cwidth, "height" => $cheight];


    // (C) CROP IMAGE
    $crop = imagecrop($img, $area);
    /*
    // (D) SAVE CROPPED IMAGE
    imagejpeg($crop, $novo_full, 50);

    // (E) RECOMMENDED CLEANUP - DESTROY IMAGE OBJECTS
    imagedestroy($img);
    imagedestroy($crop);
    */
    // (D) RESIZE & SAVE CROPPED IMAGE
    $tosize = 0.8; // SHRINK CROPPED IMAGE TO 80%
    $rwidth = 60;//ceil($cwidth * $tosize);
    $rheight = 60;//ceil($cheight * $tosize);
    $resized = imagecreatetruecolor($rwidth, $rheight);
    imagecopyresampled($resized, $crop, 0, 0, 0, 0, $rwidth, $rheight, $cwidth, $cheight);
    imagejpeg($resized, $novo_full);

}
