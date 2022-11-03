<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "caregiver".
 *
 * @property string $mail
 * @property string $nome
 * @property string $cognome
 * @property string|null $dataNascita
 * @property string|null $utenteAss
 * @property string|null $password
 *
 */
class CaregiverModel extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caregiver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail', 'nome', 'cognome'], 'required'],
            [['dataNascita'], 'safe'],
            [['mail', 'nome', 'cognome', 'utenteAss'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 25],
            [['mail'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mail' => 'Mail',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'dataNascita' => 'Data Nascita',
            'utenteAss' => 'Utente Ass',
            'password' => 'Password',
        ];
    }


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    /**
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }
    public function getId()
    {
        return $this->mail;
    }
    public function getAuthKey()
    {
        return null;//$this->authKey;
    }
    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException();
//return $this->authKey == $authKey;
    }
    public static function findByMail($mail){
        return self::findOne(['mail' => $mail]);
    }
}
