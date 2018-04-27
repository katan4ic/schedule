<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-index">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num') ?>
    <?= $form->field($model, 'start') ?>
    <?= $form->field($model, 'end') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-index -->