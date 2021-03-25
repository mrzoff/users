<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
class RegistrationForm extends Model
{ 
    public $username;
    public $email;
    public $password;
 
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Логин занят'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email уже используется'],
            ['password', 'required'],
            ['password', 'string', 'min' => 4],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'auth_key' => 'Ключ',
            'password' => 'Пароль',
            'email' => 'Email',
        ];
    }

    public function signup()
    { 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);

        if (!$user->save()) {
            throw new \yii\web\HttpException(400, var_dump($user->errors));
            
        }        
        return $user;
    }
 
}