<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $date_reg
 * @property integer $date_last
 * @property integer $status
 */
class Users extends \yii\db\ActiveRecord
{
    public $rpassword;

    public static function tableName()
    {
        return 'site_users';
    }

    public function beforeSave($insert)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $this->date_reg = time();

        return parent::beforeSave($insert);
    }


    public function rules()
    {
        return [
            ['username', 'unique'],
            [['username', 'password', 'rpassword', 'group'], 'required'],
            ['rpassword', 'compare', 'compareAttribute'=>'password'],
            [['date_reg', 'date_last', 'status'], 'integer'],
            [['username', 'group'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 65]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'rpassword' => 'Повторите пароль',
            'group' => 'Номер группы(например ИСб-25)',
            'date_reg' => 'Date Reg',
            'date_last' => 'Date Last',
            'status' => 'Status',
        ];
    }
}
