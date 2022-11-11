<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\SoluzioniModel $model */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;



?>

<?php

echo "<h1>DEMO ESERCIZIO</h1>";

$form = ActiveForm::begin();
?>
<div class="form-group">
    <table style = 'margin-left:auto;margin-right:auto'>
        <tr>
            <td>
                <img src="/demoesercizio/cocco.jpg" alt="google advertising" height="288" width="388"/>
            </td>
            <td>
                <img src="/demoesercizio/gatto.jpg" alt="google advertising" height="288" width="388"/>
            </td>
            <td>
                <img src="/demoesercizio/cane.jpg" alt="google advertising" height="288" width="388"/>
            </td>
            <td>
                <img src="/demoesercizio/mela.jpg" alt="google advertising" height="288" width="388"/>
            </td>
        </tr>
        <tr align = "center">
            <td>
                1
            </td>
            <td>
                2
            </td>
            <td>
                3
            </td>
            <td>
                4
            </td>
        </tr>
</div>

<?= $form->field($model, 'soluzione1')->textInput() ?>
<?= $form->field($model, 'soluzione2')->textInput() ?>
<?= $form->field($model, 'soluzione3')->textInput() ?>
<?= $form->field($model, 'soluzione4')->textInput() ?>

<div class="form-group">
    <div>
        <?= Html::submitButton('Conferma', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>