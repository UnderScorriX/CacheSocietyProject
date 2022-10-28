<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

echo "<h1>Piacere di rivederti, " . $_COOKIE['caregiver'] . "</h1>";

?>
<div class="form-group">

    <?php
    echo Html::a('Passa alla schermata per prenotare una seduta',['/prenotazione/vistaprenotazioni?actor=caregiver']);
    ?>

</div>