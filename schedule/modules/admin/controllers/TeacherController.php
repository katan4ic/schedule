<?php

namespace app\modules\admin\controllers;

use app\models\Teacher;
use yii\web\Controller;

class TeacherController extends Controller
{
    public function actionIndex()
    {
        $model = new Teacher();
        $teachers = $model->find()->asArray()->all();

        return $this->render('index', ['teachers' => $teachers]);
    }

    public function actionAdd(){
        $model = new Teacher();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['teacher/index']);
        }

        \Yii::$app->session->setFlash('success', 'Преподаватель успешно создан', true);

        return $this->render('_form', ['model' => $model]);
    }

    public function actionEdit($id)
    {
        $model = Teacher::findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['teacher/index']);
        }

        \Yii::$app->session->setFlash('success', 'Преподаватель успешно перезаписан', true);

        return $this->render('_form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if (Teacher::findOne($id)->delete()) {
            \Yii::$app->session->setFlash('success', 'Преподаватель успешно удален', true);

            return $this->redirect(['teacher/index']);
        }
    }
}
