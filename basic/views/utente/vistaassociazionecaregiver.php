<?php

/** @var array $caregivers */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

echo Html::beginForm();

$caregivers = ArrayHelper::map($caregivers, 'mail', function ($par) {
    return $par['nome'] . ' ' . $par['cognome'] . ' - ' . $par['mail'];
});

echo Html::dropDownList('caregiver','mail',$caregivers);

echo Html::submitButton('Assegna', ['class' => 'btn btn-primary mr-1',  'name' => 'assegna_a_caregiver']);

echo Html::endForm();

?>