<?php
$v = file_get_contents('http://j97881h0.bget.ru/api/schedule.php?cmd=getversion');
$v = floatval($v);
?>

<style>
    img {
        margin: 0 auto;
    }
</style>

<div class="jumbotron">
    <a href="<?= \yii\helpers\Url::base() . '/app/' . $v . '.apk' ?>" class="btn btn-lg btn-success">Скачать
        бесплатно v<?= $v ?></a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php echo \yii\helpers\Html::img(\yii\helpers\Url::base() . '/img/android_1.png', ['class' => 'img-responsive']); ?>
        </div>
        <div class="col-md-4">
            <?php echo \yii\helpers\Html::img(\yii\helpers\Url::base() . '/img/android_2.png', ['class' => 'img-responsive']); ?>
        </div>
        <div class="col-md-4">
            <?php echo \yii\helpers\Html::img(\yii\helpers\Url::base() . '/img/android_3.png', ['class' => 'img-responsive']); ?>
        </div>
    </div>
</div>
