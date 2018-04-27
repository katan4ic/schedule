<div style="text-align: center">
    <a href="<?= \yii\helpers\Url::to(['schedule/add']) ?>" class="btn btn-primary">Добавить предмет</a>
</div>

<br />

<?php $week = Yii::$app->request->get('week'); ?>

<ul class="list-group">
    <table class="table table-responsive">
        <tr>
            <th>#</th>
            <th>Предмет</th>
            <th>Преподаватель</th>
            <th>Кабинет</th>
            <th>Приходить</th>
            <th>Действия</th>
        </tr>
        <?php
        use app\models\Schedule;
        use yii\helpers\Html;

        foreach ($model as $key => $value): ?>
            <tr>
                <td><?= $value['num'] ?></td>
                <td><?= $value['subject']['name'] ?></td>
                <td><?= $value['teacher']['name'] ?></td>
                <td><?= $value['office'] ?></td>
                <td><?= Schedule::getWhoCome($value['stud_subgroup']) ?></td>
                <td><?= Html::a('Редактироать', ['schedule/edit', 'id' => $value['id'], 'week'=>$week], ['class' => 'btn btn-primary']); ?></td>
                <td><?= Html::a('Удалить', ['schedule/delete', 'id' => $value['id']], ['class' => 'btn btn-danger']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</ul>
