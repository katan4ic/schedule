<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form ActiveForm */
?>
<div class="site">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить группа', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site -->