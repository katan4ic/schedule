<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user == null) {
                $this->addError('username', 'Такой пользователь не найден');
            } else if (!Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
                $this->addError('password', 'Неверный пароль.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            if (Yii::$app->user->login($this->getUser(), 3600 * 24 * 30)) {
                Yii::$app->db->createCommand('UPDATE site_users SET date_last=:date WHERE id=:id', [':date' => time(), 'id' => $this->_user->id])->execute();
                return true;
            }
        } else {
            return false;
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}
