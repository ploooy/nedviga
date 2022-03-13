<?php
    error_reporting(E_ALL);

    require_once 'app/include/database.php';
    require_once 'app/include/functions.php';

    $obj_id = $_GET['obj_id'];
    $obj_type = $_GET['obj_type'];

    // TODO: make 404 page
    if (!is_numeric($obj_id)) exit();

    if ($obj_type == 'apartment')
        $obj = get_apartment_by_id($obj_id);
    else if ($obj_type == 'house')
        $obj = get_house_by_id($obj_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$obj['title']?></title>
    <link href="public/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require_once('./app/header.php')?>
    <div class="infopage-container">
        <h3><?=$obj['title']?></h3>
        <div class="infopage-top-container">
            <img src="<?=$obj['img_url']?>" alt="<?=$obj['title']?>" class="infopage-img">
            <div class="infopage-specifications">
                <h4 class="bold">Характеристики:</h4>
                    <?php if(!strcmp($obj_type, 'apartment')):?>
                        <ul class="infopage-list">
                            <li><span class="bold">ЖК: </span><?=$obj['residential_complex']?></li>
                            <li><span class="bold">Комнаты: </span><?=$obj['rooms']?></li>
                            <li><span class="bold">Этаж: </span><?=$obj['floor']?> из <?=$obj['top_floor']?></li>
                            <li><span class="bold">Площадь: </span><?=$obj['area']?> кв.м.</li>
                            <li><span class="bold">Год постройки: </span><?=$obj['construction_year']?></li>
                            <li><span class="bold">Адрес: </span><?=$obj['address']?></li>
                        </ul>
                        <p class="infopage-price"><span class="bold">Цена: </span><?=$obj['price']?>₽</p>

                        <? elseif(!strcmp($obj_type, 'house')): ?>
                            <ul class="infopage-list">
                            <li><span class="bold">Комнаты: </span><?=$obj['rooms']?></li>
                             <li><span class="bold">Этажи: </span><?=$obj['floors']?></li>
                            <li><span class="bold">Площадь дома: </span><?=$obj['house_area']?> кв.м.</li>
                            <li><span class="bold">Площадь участка: </span><?=$obj['plot_area']?> кв.м.</li>
                            <li><span class="bold">Год постройки: </span><?=$obj['construction_year']?></li>
                            <li><span class="bold">Адрес: </span><?=$obj['address']?></li>
                        </ul>
                        <p class="infopage-price"><span class="bold">Цена: </span><?=$obj['price']?>₽</p>
                        <?php endif; ?>
            </div>
        </div>
        <div class="infopage-bottom-container">
            <h3 class="infopage-bottom-header">Описание</h3>
            <p class="infopage-bottom-info">
                <?=$obj['info']?>
            </p>
        </div>
    </div>
    <?php require_once('app/footer.php');?>
</body>
</html>

