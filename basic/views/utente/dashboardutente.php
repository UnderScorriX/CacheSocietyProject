<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

echo "<h1>Piacere di rivederti, " . $_COOKIE['utente'] . "</h1>";

?>
<div class="form-group">

    <?php
    echo Html::a('Passa alla schermata per collegare il tuo account ad un caregiver',['vistaassociazionecaregiver']);
    ?>

</div>