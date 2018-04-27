<?php
use yii\bootstrap\Tabs;

?>

    <h1>
        <center>Группа: <?= Yii::$app->request->get('group') ?></center>
    </h1>
<?php
echo Tabs::widget([
    'items' => [
        [
            'label' => 'Четная неделя',
            'content' => Yii::$app->controller->renderPartial('odd', ['data' => $model, 'week' => 'even'])
        ],
        [
            'label' => 'Нечетная неделя',
            'content' => Yii::$app->controller->renderPartial('odd', ['data' => $model, 'week' => 'odd'])
        ],
    ]
]);