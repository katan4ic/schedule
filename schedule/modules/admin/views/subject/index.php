<?php
use yii\helpers\Url;

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->get('success'); ?>
    </div>
<?php endif; ?>

<div style="text-align: center;">
    <a href="<?= Url::to(['subject/add']); ?>" type="button" class="btn btn-primary" aria-label="Left Align">
        Добавить предмет
    </a>
</div>

<br/>

<ul class="list-group">
    <?php foreach ($model as $key => $value): ?>
        <li class="list-group-item">
            <span
                class="badge"><?= \yii\helpers\Html::a('Удалить', ['subject/delete/', 'id' => $value['id']], ['style' => 'color: white;']); ?></span>
            <span
                class="badge"><?= \yii\helpers\Html::a('Редактировать', ['subject/edit/', 'id' => $value['id']], ['style' => 'color: white;']); ?></span>
            <?= $value['name'] ?>
        </li>
    <?php endforeach; ?>
</ul>
