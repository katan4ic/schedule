<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_config".
 *
 * @property integer $id
 * @property string $k
 * @property string $v
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['k', 'v'], 'required'],
            [['k', 'v'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'k' => 'K',
            'v' => 'V',
        ];
    }
}
