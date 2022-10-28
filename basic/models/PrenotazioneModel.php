<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appuntamento".
 *
 * @property int $id
 * @property string $data
 * @property string $mailLogopedista
 * @property string $mailCaregiver
 * @property string $mailUtente
 * @property int|null $conferma
 * @property int|null $diagnosiId
 * @property string|null $ora
 *
 */
class PrenotazioneModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appuntamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'mailLogopedista', 'mailCaregiver', 'mailUtente'], 'required'],
            [['data', 'ora'], 'safe'],
            [['conferma', 'diagnosiId'], 'integer'],
            [['mailLogopedista', 'mailCaregiver', 'mailUtente'], 'string', 'max' => 50],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'mailLogopedista' => 'Mail Logopedista',
            'mailCaregiver' => 'Mail Caregiver',
            'mailUtente' => 'Mail Utente',
            'conferma' => 'Conferma',
            'diagnosiId' => 'Diagnosi ID',
            'ora' => 'Ora',
        ];
    }

    /**
     * Gets query for [[Diagnosi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosi()
    {
        return $this->hasOne(DiagnosiModel::class, ['id' => 'diagnosiId']);
    }

    /**
     * Gets query for [[MailCaregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMailCaregiver0()
    {
        return $this->hasOne(CaregiverModel::class, ['mail' => 'mailCaregiver']);
    }

    /**
     * Gets query for [[MailLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMailLogopedista0()
    {
        return $this->hasOne(LogopedistaModel::class, ['mail' => 'mailLogopedista']);
    }

    /**
     * Gets query for [[MailUtente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMailUtente0()
    {
        return $this->hasOne(UtenteModel::class, ['mail' => 'mailUtente']);
    }
}
