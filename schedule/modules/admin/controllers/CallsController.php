<?php

namespace app\modules\admin\controllers;

use app\models\Calls;
use yii\web\Controller;

class CallsController extends Controller
{
    public function actionIndex()
    {
        $model = Calls::find()->asArray()->all();

        return $this->render('index', ['model'=>$model]);
    }

    public function actionEdit($id){
        $model = Calls::findOne($id);

        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success', 'Расписание успешно обновлено', true);
            return $this->redirect(['calls/index']);
        }

        return $this->render('_form', ['model'=>$model]);
    }
}
