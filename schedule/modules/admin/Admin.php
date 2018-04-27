<?php

namespace app\modules\admin;

use app\models\Users;
use yii\helpers\Url;

class Admin extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = "main";

    public function init()
    {
        if (!\Yii::$app->user->isGuest) {
            $user = Users::find()->where(['id' => \Yii::$app->user->id])->one();

            if ($user) {
                if ($user->status < 4) {
                    \Yii::$app->response->redirect(Url::home());
                }
            }
        } else {
            \Yii::$app->response->redirect(Url::home());
        }

        parent::init();
    }
}
