<?php
use yii\helpers\Url;

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->get('success'); ?>
    </div>
<?php endif; ?>

<div style="text-align: center;">
    <a href="<?= Url::to(['teacher/add']); ?>" type="button" class="btn btn-primary" aria-label="Left Align">
        Добавить преподавателя
    </a>
</div>

<br/>

<ul class="list-group">
    <?php foreach ($teachers as $key => $value): ?>
        <li class="list-group-item">
            <span
                class="badge"><?= \yii\helpers\Html::a('Удалить', ['teacher/delete/', 'id' => $value['id']], ['style' => 'color: white;']); ?></span>
            <span
                class="badge"><?= \yii\helpers\Html::a('Редактировать', ['teacher/edit/', 'id' => $value['id']], ['style' => 'color: white;']); ?></span>
            <?= $value['name'] ?>
        </li>
    <?php endforeach; ?>
</ul>
