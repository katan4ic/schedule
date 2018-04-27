<?php

namespace app\modules\admin\controllers;

use app\models\Group;
use app\models\Schedule;
use yii\web\Controller;

class ScheduleController extends Controller
{
    public function actionIndex($group)
    {
        $model = Schedule::find()->where('stud_group=:group', [':group' => $group])->joinWith(['teacher', 'subject'])->orderBy('num')->asArray()->all();

        return $this->render('index', ['model' => $model]);
    }

    public function actionGrouplist()
    {
        $model = Group::find()->asArray()->all();

        return $this->render('group_list', ['model' => $model]);
    }

    public function actionList($id, $week, $group)
    {
        $model = Schedule::find()->where('day=:day AND week=:week AND stud_group=:group', [':day' => $id, ':week' => $week, ':group' => $group])->joinWith(['subject', 'teacher'])->asArray()->all();

        return $this->render('list', ['model' => $model]);
    }

    public function actionEdit($id)
    {
        $model = Schedule::findOne($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['schedule/list', 'id' => $model->day, 'week' => $model->week]);
        }

        return $this->render('_form', ['model' => $model]);
    }


    public function actionAdd()
    {
        $model = new Schedule();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['schedule/list', 'id' => $model->day, 'week' => $model->week, 'group'=>$model->stud_group]);
        }

        return $this->render('_form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->getData($id);
        Schedule::findOne($id)->delete();

        return $this->redirect(['schedule/list', 'id' => $model->day, 'week' => $model->week, 'group'=>$model->stud_group]);
    }

    protected function getData($id)
    {
        return Schedule::findOne($id);
    }
}
