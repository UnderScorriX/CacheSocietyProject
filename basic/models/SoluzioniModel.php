<?php

namespace app\models;

use yii\base\Model;

class SoluzioniModel extends Model
{
    public $soluzione1;
    public $soluzione2;
    public $soluzione3;
    public $soluzione4;


    public function attributeLabels()
    {
        return [
            'soluzione1' => \Yii::t('app', 'Soluzione 1'),
            'soluzione2' => \Yii::t('app', 'Soluzione 2'),
            'soluzione3' => \Yii::t('app', 'Soluzione 3'),
            'soluzione4' => \Yii::t('app', 'Soluzione 4'),
        ];
    }

    public function rules()
    {
        return [
            [['soluzione1', 'soluzione2', 'soluzione3', 'soluzione4'], 'required']
        ];
    }
}