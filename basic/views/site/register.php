<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */
/** @var $actor string */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use kartik\date\DatePicker;


$this->title = 'Registrazione';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php
    $actor = $_GET['actor'];
    Yii::error(Yii::$app->request->get());
    if($actor == 'logopedista') $model = new \app\models\LogopedistaModel();
    else if($actor == 'utente') $model = new \app\models\UtenteModel();
    else if($actor == 'caregiver') $model = new \app\models\CaregiverModel();
    else Yii::error("forse hai sbagliato lavoro");
    Yii::error($actor);
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'mail')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'nome')->textInput() ?>

        <?= $form->field($model, 'cognome')->textInput() ?>

        <?= $form->field($model, 'dataNascita')->widget(DatePicker::className(), [
        'name' => 'dataNascita',
        'type' => DatePicker::TYPE_INPUT,
        'value' => '',
        'bsVersion' => '5',
        'language' => 'it',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
        ])->label('Data di nascita'); ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Registrati', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
