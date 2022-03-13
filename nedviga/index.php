<?php 
    require_once 'app/include/database.php';
    require_once 'app/include/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nedviga</title>
        <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/free/png-256/house-3610057-3014822.png" type="image/x-icon">
        <link href="public/css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php require './app/header.php';?>

        <?php $_GET['page'] = $_GET['page'] == '' ? 'apartments' : $_GET['page']?>

        <?php if($_GET['page'] == 'apartments'): ?>
            <h2 class="page-title">Квартиры</h2>
        <?php elseif($_GET['page'] == 'houses'): ?>
            <h2 class="page-title">Дома</h2>
        <?php elseif($_GET['page'] == 'feedbacks'): ?>
            <h2 class="page-title">Отзывы</h2>
        <?php endif; ?>
        <div class="content">
            <?php 
            $objs = null;
            $obj_type = 'apartment';
            ?>

            <?php if($_GET['page'] == 'apartments'): ?>
                <?php $objs = get_apartments(); $obj_type = 'apartment'; ?>
            <?php elseif($_GET['page'] == 'houses'): ?>
                <?php $objs = get_houses(); $obj_type = 'house'; ?>
            <?php elseif($_GET['page'] == 'feedbacks'): ?>
                <?php $objs = get_feedbacks(); $obj_type = 'feedbacks'; ?>
            <?php endif; ?>  
            <?php if(!is_null($objs) AND strcmp($obj_type, 'feedbacks')): foreach($objs as $obj): ?>
                    <div class="card">
                        <a href="/infopage.php?obj_id=<?=$obj['id']?>&obj_type=<?=$obj_type?>" class="card-link">
                            <div class="img-center">
                                <img src="<?=$obj['img_url']?>" alt="<?=$obj['title']?>" class="card-img">
                            </div>
                            <div class="card-info">
                                <h4 class="card-title"><?=$obj['title']?></h4>
                                <p class="card-description"><?=$obj['info']?></p>
                                <p class="card-city"><?=$obj['city']?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php elseif(!is_null($objs) AND $obj_type == 'feedbacks'): ?>
                <?php foreach($objs as $feedback): ?>
                    <div class="feedback-card">
                        <img src="<?=$feedback['img_url']?>" alt="user_photo" class="feedback-img">
                        <div class="feedback-body">
                            <p class="feedback-username bold"><?=$feedback['name']?></p>
                            <p class="feedback-text"><?=$feedback['text']?></p>
                            <p class="feedback-stars bold"><?=$feedback['stars']?>/10</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>       
        <?php require './app/footer.php';?>
    </body>
</html>
