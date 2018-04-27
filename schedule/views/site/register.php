<?php

use app\models\Group;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$group = Group::find()->asArray()->all();
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->get('success'); ?>
    </div>
<?php else: ?>
    <div class="site-index">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rpassword')->passwordInput() ?>
        <?= $form->field($model, 'group')->dropDownList(ArrayHelper::map($group, 'group_name', 'group_name'))->label('Группа') ?>

        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div><!-- site-index -->
<?php endif; ?>