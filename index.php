<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <?php require_once 'service.php'; ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php function getCell($item = null) { 
    if ($item == null) {return;} ?>
    <div class="grid-item" style="background-image: url('logo.png'); background-size: width: 7cm; height: 9.9cm;">
        <p class="inner" style="font-size: 15px;">ПРОСКАНИРУЙТЕ КОД</p>
        <img width="160" style="top: 40px;" src="images/<?php echo $item['file']; ?>" />
        <p class="inner" style="font-size: 13px;">ИЛИ ОТКРОЙТЕ ССЫЛКУ:</p>
        <p class="innerV">awards.radioir.ru</p>
        <p class="inner">И ВВЕДИТЕ КОД:</p>
        <p class="innerCode"><?php echo $item['code']; ?></p>
        <!-- <img src="logo.png" width="210" style="position: flex;" /> -->
    </div>
    <?php } ?>

    <?php $modifiedArr = $arr; $num = count($arr) / 9;
    for ($i = 0; $i < $num; $i++)  { ?>
        <div class="wrapper">
            <div class="block capture">
                <div class="grid-container">
                <?php
                for ($pos = 0; $pos < 9; $pos++) {
                    getCell($modifiedArr[$pos]);
                    unset($modifiedArr[$pos]);
                }
                $modifiedArr = array_values($modifiedArr); ?>
                </div>
            </div>
            <button class="btn">Скачать</button>
        </div>
    <?php } ?>
</body>
<script>
$(".btn").click(function() {
    var curent = $(this)
    html2canvas(curent.parent().find('.capture'),{
        onrendered: function(canvas) {
            return Canvas2Image.saveAsPNG(canvas);
        }
    });
});
</script>
</html>
