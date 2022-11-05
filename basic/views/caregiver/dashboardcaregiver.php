<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

echo "<h1>Piacere di rivederti, " . $_COOKIE['caregiver'] . "</h1>";

?>
<div class="form-group">

    <br><div class="body-content">

        <div class="row">
            <div class="col text-center">
                <p>Passa alla schermata per prenotare una seduta</p>
                <p><a class="btn btn-primary" href="/prenotazione/vistaprenotazioni?actor=caregiver">Prenota</a></p>
            </div>

            <div class="col text-center">
                <p>Passa alla schermata per collegare il tuo account ad un logopedista</p>
                <p><a class="btn btn-primary" href="/caregiver/vistaassociazionelogopedista">Associa</a></p>
            </div>
        </div>

    </div>

</div>