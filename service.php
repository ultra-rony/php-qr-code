<?php

require_once __DIR__ . '/phpqrcode/qrlib.php';
 
/* Генерация QR-кода во временный файл */


function generateQrCode($dt) {
    try {
        $fileName = rand(100000, 999999) . '.png';
        QRcode::png($dt['link'] . 'awards/2023/' . $dt['code'], __DIR__ . '/images/' . $fileName, 'M', 6, 2);
        
        $im = imagecreatefrompng(__DIR__ . 'images/' . $fileName);
        $width = imagesx($im);
        $height = imagesy($im);
        
        /* Цвет фона в RGB */
        $bg_color = imageColorAllocate($im, 255, 145, 43);
        
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $color = imagecolorat($im, $x, $y);
                if ($color == 0) {
                    imageSetPixel($im, $x, $y, $bg_color);
                }
            }
        }
        return $fileName;
    }catch (\Exception $e) {
        die();
    }
}

$arr = [
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "http://awards.radioir.ru/",
        'code' => "N4Rja",
        'file' => ""
    ],

];


foreach($arr as $key => $value) {
    $arr[$key]['file'] = generateQrCode($value);
}
?>
