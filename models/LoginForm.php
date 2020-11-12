<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Модель формы авторизации пользователя в системе.
 * 
 * @property User|null
 */
class LoginForm extends Model
{
    public $username; // Наименование пользователя.
    public $password; // Пароль пользователя.
    public $rememberMe = true; // Запоминание данных, которые ввел пользователь.

    private $_user = false;


    /**
     * Правила для полей формы авторизации пользователя в системе.
     * 
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Русификация полей формы авторизации пользователя в системе.
     * 
     * @return array
     */
    public function attributeLabels()
    {
        return[
            'username' => 'Имя пользователя',
            'remeberMe' => 'Запомнить меня', 
            'password' => 'Пароль',
        ];
    }

    /**
     * Функция для проверки пароля при авторизации.
     * 
     * @param string 
     * @param array
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Функция для запоминания данных после прохождения процесса авторизации.
     * 
     * @return bool
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Получение данных пользователя
     * 
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
