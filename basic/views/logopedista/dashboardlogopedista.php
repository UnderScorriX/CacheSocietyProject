<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

echo "<h1>Piacere di rivederti, " . $_COOKIE['logopedista'] . $actor . "</h1>";

?>
<div class="form-group">

    <?php
        $mail = $_COOKIE['logopedista'];
        echo Html::a('Visualizza Appuntamenti da Confermare',['/prenotazione/vistaprenotazioni?actor=logopedista']);
    ?>

</div>