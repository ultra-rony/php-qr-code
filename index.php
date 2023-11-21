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
        'link' => "awards.radioir.ru",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "awards.radioir.ru",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "awards.radioir.ru",
        'code' => "N4Rja",
        'file' => ""
    ],
    [
        'link' => "awards.radioir.ru",
        'code' => "N4Rja",
        'file' => ""
    ],

];


foreach($arr as $key => $value) {
    $arr[$key]['file'] = generateQrCode($value);
}


function getCell($item = null) { 
    if ($item == null) {return;} ?>
    <div class="divTableCell">
        <div class="divContainer">
            <p class="inner" style="top: 5px;">ПРОСКАНИРУЙТЕ КОД</p>
            <img class="inner"  width="160" style="top: 40px;" src="images/<?php echo $item['file']; ?>" />
            <p class="innerSmallTextLight" style="top: 195px;" >ИЛИ ОТКРОЙТЕ ССЫЛКУ:</p>
            <p class="innerSmallText" style="top: 215px;" ><?php echo $item['link']; ?></p>
            <p class="innerSmallTextLight" style="top: 235px;" >И ВВЕДИТЕ КОД:</p>
            <p class="innerBigText" style="top: 225px;" ><?php echo $item['code']; ?></p>
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
<script>
import domtoimage from 'dom-to-image';

capturar(){
    var node = document.getElementById('capture');
    var options = {quality: 1};

    domtoimage.toJpeg(node, options).then((dataUrl) => {
      console.log(dataUrl) //Image in base64 jpeg
    });
}
</script>  
