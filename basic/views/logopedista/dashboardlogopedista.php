<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

echo "<h1>Piacere di rivederti, " . $_COOKIE['logopedista'] . $actor .  "</h1>";

?>
<div class="form-group">

    <?php
        $mail = $_COOKIE['logopedista'];
    ?>

    <br><div class="body-content">

        <div class="row">
            <div class="col text-center">
                <p>Aggiungi diagnosi ad un appuntamento effettuato</p>
                <p><a class="btn btn-primary" href="/prenotazione/vistadiagnosi">Aggiungi diagnosi</a></p>
            </div>

            <div class="col text-center">
                <p>Conferma un appuntamento pendente, richiesto dai caregiver</p>
                <p><a class="btn btn-primary" href="/prenotazione/vistaprenotazioni?actor=logopedista">Visualizza appuntamenti</a></p>
            </div>
        </div>

    </div>
</div>