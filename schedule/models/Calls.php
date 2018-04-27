<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_calls".
 *
 * @property integer $id
 * @property integer $num
 * @property string $start
 * @property string $end
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_calls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'start', 'end'], 'required'],
            [['num'], 'integer'],
            [['start', 'end'], 'time'],
            [['start', 'end'], 'safe']
        ];
    }

    public function time($attribute, $params)
    {
        $data = explode(':', $this->$attribute);

        if (count($data) != 3) {
            $this->addError($attribute, 'Время должно быть указано в формате ЧЧ:ММ:СС');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Номера пары',
            'start' => 'Начало пары',
            'end' => 'Конец пары',
        ];
    }
}
