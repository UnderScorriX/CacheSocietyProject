<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosi".
 *
 * @property int $id
 * @property string $percorso
 *
 * @property Appuntamento[] $appuntamentos
 */
class DiagnosiModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percorso'], 'required'],
            [['percorso'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percorso' => 'Percorso',
        ];
    }

    /**
     * Gets query for [[Appuntamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppuntamentos()
    {
        return $this->hasMany(Appuntamento::class, ['diagnosiId' => 'id']);
    }
}
