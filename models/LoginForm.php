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
    public $nivel;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Usuário',
            'password' => 'Senha',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getAuth();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Usuário ou senha inválido.');
            }
        }
    }
    
    public function validateNivel($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getAuthNivel();

            if (!$user || !$user->validateNivel($this->nivel)) {
                $this->addError($attribute, 'Login inválido.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getAuth());
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return Auth|null
     */
    public function getAuth()
    {
        if ($this->_user === false) {
            $this->_user = Auth::findByUsername($this->username, $this->password);
        }

        return $this->_user;
    }
    
    public function getAuthNivel()
    {
        if ($this->_user === false) {
            $this->_user = Auth::findByUsernameNivel($this->username, $this->nivel);
        }

        return $this->_user;
    }
}
