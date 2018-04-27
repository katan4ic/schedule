<?php
use app\models\Schedule;

$group = Yii::$app->request->get('group');
?>
<br/>
<?php
for ($i = 1; $i <= 6; $i++): ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><?= Schedule::getDayName($i); ?>
            <div
                style="float: right;"><?php echo \yii\helpers\Html::a('Редактировать', ['schedule/list', 'id' => $i, 'week'=>$week, 'group'=>$group], ['class' => 'btn btn-info']); ?></div>
            <div style="clear: both;"></div>
        </div>

        <table class="table table-responsive">
            <tr>
                <th>#</th>
                <th>Предмет</th>
                <th>Преподаватель</th>
                <th>Кабинет</th>
                <th>Приходить</th>
            </tr>
            <?php foreach ($data as $key => $value): ?>
                <?php if ($value['day'] == $i && $value['week'] == $week): ?>
                    <tr>
                        <td><?= $value['num'] ?></td>
                        <td><?= $value['subject']['name'] ?></td>
                        <td><?= $value['teacher']['name'] ?></td>
                        <td><?= $value['office'] ?></td>
                        <td><?= Schedule::getWhoCome($value['stud_subgroup']) ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>
<?php endfor; ?>