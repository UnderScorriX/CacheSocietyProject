<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedista".
 *
 * @property string $mail
 * @property string $nome
 * @property string $cognome
 * @property string|null $dataNascita
 * @property string|null $password
 */
class LogopedistaModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logopedista';
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
}
