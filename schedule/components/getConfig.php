<?php
namespace app\components;

use app\models\Config;
use Yii;
use yii\base\Component;

class getConfig extends Component
{
    public function findConfig()
    {
        return Config::find()->asArray()->all();
    }

    public function get($param)
    {
        $model = Config::find()->where(['k'=>$param])->one();
        return $model->v;
    }

    public function set($param, $value)
    {
        $model = $this->findConfig();

        $model->$param = $value;
        $model->save(false);
    }
}