<link rel="stylesheet" href="/style.css">

<?php

require_once __DIR__ . '/phpqrcode/qrlib.php';
 
/* Генерация QR-кода во временный файл */


function generateQrCode($dt) {
    try {
        $fileName = rand(100000, 999999) . '.png';
        QRcode::png($dt['link'], __DIR__ . '/images/' . $fileName, 'M', 6, 2);
        
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
        'title' => "23",
        'link' => "321312.dsadasdjk",
        'code' => "12",
        'file' => ""
    ],
    [
        'title' => "24",
        'link' => "fdsf:dsadasd",
        'code' => "13",
        'file' => ""
    ],
    [
        'title' => "25",
        'link' => "fdsfd432432",
        'code' => "15",
        'file' => ""
    ],
    [
        'title' => "26",
        'link' => "gfdgfjj:432423",
        'code' => "16",
        'file' => ""
    ],
    [
        'title' => "27",
        'link' => "432423:fdsf",
        'code' => "17",
        'file' => ""
    ],
    [
        'title' => "28",
        'link' => "dsadas:kjjhk",
        'code' => "18",
        'file' => ""
    ],
    [
        'title' => "29",
        'link' => "321:dsada",
        'code' => "19",
        'file' => ""
    ]

];


foreach($arr as $key => $value) {
    $arr[$key]['file'] = generateQrCode($value);
}


function getCell($item = null) { 
    if ($item == null) {return;} ?>
    <div class="divTableCell">
        <div class="divContainer">
            <p class="inner"><?php echo $item['title']; ?></p>
            <img class="inner"  width="160" style="top: 50px;" src="images/<?php echo $item['file']; ?>" />
            <p class="inner" style="top: 210px;" ><?php echo $item['link']; ?></p>
            <p class="inner" style="top: 235px;" ><?php echo $item['code']; ?></p>
            <img src="logo.png" width="230" style="position: flex;" />
        </div>
    </div>
<?php } ?>


<div class="divTable">
    <div class="divTableBody">
        <?php $modifiedArr = $arr; (int)$num = count($arr) / 3; for ($i = 0; $i < $num; $i++) {
            ?><div class="divTableRow"><?php
            for ($pos = 0; $pos < 3; $pos++) {
                getCell($modifiedArr[$pos]);
                unset($modifiedArr[$pos]);
            }
            $modifiedArr = array_values($modifiedArr);
            ?></div><?php
        } ?>
    </div>
</div>