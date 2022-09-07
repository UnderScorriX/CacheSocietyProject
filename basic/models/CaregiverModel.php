<?php

namespace app\models;

use Yii;

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
 * @property Utente $utenteAss0
 */
class CaregiverModel extends \yii\db\ActiveRecord
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
            [['mail'], 'unique'],
            [['utenteAss'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::class, 'targetAttribute' => ['utenteAss' => 'mail']],
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

    /**
     * Gets query for [[UtenteAss0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtenteAss0()
    {
        return $this->hasOne(Utente::class, ['mail' => 'utenteAss']);
    }
}
