<?php
use yii\helpers\Url;

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->get('success'); ?>
    </div>
<?php endif; ?>

<table class="table table-responsive">
    <tr>
        <th>Номер пары</th>
        <th>Начало</th>
        <th>Конец</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($model as $key => $value): ?>
        <tr>
            <td><?= $value['num'] ?></td>
            <td><?= $value['start'] ?></td>
            <td><?= $value['end'] ?></td>
            <td>
                <a href="<?= Url::to(['calls/edit', 'id' => $value['id']]) ?>" class="btn btn-primary">Редактировать</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
