<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Schedule;
use app\models\Subject;
use app\models\Teacher;
use app\models\Group;
use yii\helpers\ArrayHelper;


$subject = Subject::find()->asArray()->all();
$teacher = Teacher::find()->asArray()->all();
$group = Group::find()->asArray()->all();
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'day')->dropDownList(Schedule::getDayName()) ?>
<?= $form->field($model, 'num') ?>
<?= $form->field($model, 'week')->dropDownList([
    'odd' => 'Нечетная',
    'even' => 'Четная'
]); ?>
<?= $form->field($model, 'id_subject')->dropDownList(ArrayHelper::map($subject, 'id', 'name'))->label('Предмет') ?>
<?= $form->field($model, 'id_teacher')->dropDownList(ArrayHelper::map($teacher, 'id', 'name'))->label('Преподаватель') ?>
<?= $form->field($model, 'office') ?>
<?= $form->field($model, 'stud_group')->dropDownList(ArrayHelper::map($group, 'group_name', 'group_name'))->label('Группа') ?>
<?= $form->field($model, 'stud_subgroup')->dropDownList([
    1 => '1 подгруппа',
    2 => '2 подгруппа',
    3 => 'Всем'
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>