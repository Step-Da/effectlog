<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Модель формы регистрации пользователя в системе.
 */
class SignupForm extends Model
{
    public $username; // Новое наименование пользователя.
    public $email; // Новый адрес электронной почты пользователя.
    public $password; // Новый пароль пользователя.


    /**
     * Правила для полей формы регистрации пользователя в системе.
     * 
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такое логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такая почта уже занята.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Русификация полей формы реистрации пользователя в системе.
     * 
     * @return array
     */
    public function attributeLabels()
    {
        return[
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password' => 'Пароль'
        ];
    }

    /**
     * Функция для создания новго профиля пользователя в системе.
     * 
     * @return User|null
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}