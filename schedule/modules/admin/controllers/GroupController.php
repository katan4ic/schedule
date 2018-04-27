<?php

namespace app\modules\admin\controllers;

use app\models\Group;
use yii\web\Controller;
use Yii;

class GroupController extends Controller
{
    public function actionAdd()
    {
        $model = new Group();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['schedule/index', 'group'=>$model->group_name]);
        }

        return $this->render('add', ['model'=>$model]);
    }

    public function actionDelete($id){
        if(Group::findOne($id)->delete()){
            Yii::$app->session->setFlash('success', 'Группа успешно удалена', true);
            return $this->redirect(['schedule/grouplist']);
        }
    }
}
