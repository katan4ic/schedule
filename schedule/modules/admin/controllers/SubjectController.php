<?php

namespace app\modules\admin\controllers;

use app\models\Schedule;
use app\models\Subject;
use yii\web\Controller;

class SubjectController extends Controller
{
    public function actionIndex()
    {
        $model = Subject::find()->asArray()->all();

        return $this->render('index', ['model' => $model]);
    }

    public function actionAdd()
    {
        $model = new Subject();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['subject/index']);
        }

        \Yii::$app->session->setFlash('success', 'Предмет успешно создан', true);

        return $this->render('_form', ['model' => $model]);
    }

    public function actionEdit($id)
    {
        $model = Subject::findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['subject/index']);
        }

        \Yii::$app->session->setFlash('success', 'Предмет успешно перезаписан', true);

        return $this->render('_form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if (Subject::findOne($id)->delete()) {
            \Yii::$app->session->setFlash('success', 'Предмет успешно удален', true);

            return $this->redirect(['subject/index']);
        }
    }
}
