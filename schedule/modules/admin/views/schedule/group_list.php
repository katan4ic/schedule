<?php
use yii\helpers\Url;

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->get('success'); ?>
    </div>
<?php endif; ?>

<div style="text-align: center;">
    <a href="<?= Url::to(['group/add']) ?>" class="btn btn-success">Добавить группу</a>
</div>

<br/>

<ul class="list-group">
    <?php foreach ($model as $key => $value): ?>
        <li class="list-group-item">
            <span
                class="badge"><?= \yii\helpers\Html::a('Удалить', ['group/delete/', 'id' => $value['id']], ['style' => 'color: white;']); ?></span>
            <a href="<?= Url::to(['schedule/index', 'group' => $value['group_name']]); ?>"><?php echo $value['group_name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>