<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_subject".
 *
 * @property integer $id
 * @property string $name
 * @property integer $teacher
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название предмета',
        ];
    }
}
