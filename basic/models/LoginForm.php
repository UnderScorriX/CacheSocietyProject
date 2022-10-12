<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 *
 *
 */


class LoginForm extends Model
{
    public $mail;
    public $password;
    public $actor;
    private $_user = false;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['mail', 'password','actor'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 0);
        }
        return false;
    }

    /**
     * Finds user by [[mail]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            if ($this->actor == "logopedista"){
                $this->_user = LogopedistaModel::findByMail($this->mail);
            } elseif ($this->actor == "caregiver"){
                $this->_user = CaregiverModel::findByMail($this->mail);
            } elseif ($this->actor == "utente"){
                $this->_user = UtenteModel::findByMail($this->mail);
            }
            $this->_user = NULL;
        }

        return $this->_user;
    }
}
