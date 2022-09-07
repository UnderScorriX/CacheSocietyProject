<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utente".
 *
 * @property string $mail
 * @property string $nome
 * @property string $cognome
 * @property string|null $dataNascita
 * @property string|null $password
 *
 * @property Caregiver[] $caregivers
 */
class UtenteModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mail', 'nome', 'cognome'], 'required'],
            [['dataNascita'], 'safe'],
            [['mail', 'nome', 'cognome'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 25],
            [['mail'], 'unique'],
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
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Caregivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaregivers()
    {
        return $this->hasMany(Caregiver::class, ['utenteAss' => 'mail']);
    }
}
