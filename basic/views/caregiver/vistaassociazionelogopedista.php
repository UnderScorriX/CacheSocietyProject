<?php

/** @var array $logopedisti */
/** @var array $utenti */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

echo Html::beginForm();

$logopedisti = ArrayHelper::map($logopedisti, 'mail', function ($par) {
    return $par['nome'] . ' ' . $par['cognome'] . ' - ' . $par['mail'];
});

$utenti = ArrayHelper::map($utenti, 'mail', function ($par) {
    return $par['nome'] . ' ' . $par['cognome'] . ' - ' . $par['mail'];
});

echo Html::dropDownList('logopedista','mail',$logopedisti);
echo Html::dropDownList('utente','mail',$utenti);

echo Html::submitButton('Assegna', ['class' => 'btn btn-primary mr-1',  'name' => 'assegna_a_logopedista']);

echo Html::endForm();

?>