<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ButtonDropdown;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron text-left bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

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
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
    </div>

    <?php
        setcookie("logopedista", "", time());
        setcookie("utente", "", time());
        setcookie("caregiver", "", time());
    ?>
</div>
