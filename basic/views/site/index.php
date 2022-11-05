<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron text-left bg-transparent">
        <h1 class="display-4">PRONUNTIA</h1>

        <p class="lead">Benvenuto in Pronuntia, effettua la tua scelta!</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col text-center">
                <h2>Registrati</h2>
                    <?php
                        echo ButtonDropdown::widget([
                            'label' => 'Selezione tipo utente',
                            'dropdown' => [
                                'items' => [
                                    ['label' => 'Logopedista', 'url' => ['/site/register?actor=logopedista']],
                                    ['label' => 'Utente', 'url' => ['/site/register?actor=utente']],
                                    ['label' => 'Caregiver', 'url' => ['/site/register?actor=caregiver']],
                                ],
                            ],
                            'buttonOptions' => ['class' => 'btn-outline-dark ml-2 mr-2']
                        ]);
                    ?>
            </div>
            <div class="col text-center">
                <h2>Accedi</h2>
                <?php
                echo ButtonDropdown::widget([
                    'label' => 'Accesso utenti',
                    'dropdown' => [
                        'items' => [
                            ['label' => 'Logopedista', 'url' => ['/site/login?actor=logopedista']],
                            ['label' => 'Utente', 'url' => ['/site/login?actor=utente']],
                            ['label' => 'Caregiver', 'url' => ['/site/login?actor=caregiver']],
                        ],
                    ],
                    'buttonOptions' => ['class' => 'btn-outline-dark ml-2 mr-2']
                ]);
                ?>
            </div>
            <div class="col-lg-4">
                <h2>Scarica il test di autovalutazione</h2>

                <?php
                echo Html::a('Download', [Yii::$app->urlManager->createUrl(['site/download',
                'path' => '/autovalutazione/', 'file' => 'TestPronuntia.docx'])], ['class' => 'btn btn-outline-primary']);
                ?>
            </div>
        </div>
    </div>

    <?php
        setcookie("logopedista", "", time());
        setcookie("utente", "", time());
        setcookie("caregiver", "", time());
    ?>
</div>
