<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor string */
/** @var $mail string */
/** @var $dataProvider yii\data\ActiveDataProvider */

use app\models\PrenotazioneModel;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\date\DatePicker;


$this->title = 'Appuntamenti';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php

    Yii::error($actor);
    if ($actor == "logopedista"){
        try {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'dataAppuntamento',
                    'oraAppuntamento',
                    'utente',
                    'caregiver',
                    [
                        'class' => ActionColumn::className(),
                        'visibleButtons' => [
                            'delete' => false,
                            'update' => false
                        ],
                        'urlCreator' => function ($action, PrenotazioneModel $model, $key, $index, $column) {
                            $url = $action;

                            if ($action == 'view') {
                                $url = 'dettagliappuntamento';
                            } else if ($action == 'update') {
                                $url = 'aggiornaappuntamento';
                            } else if ($action == 'delete') {
                                $url = 'delete';
                            }
                            return Url::toRoute([$url, 'dataAppuntamento' => $model->dataAppuntamento, 'oraAppuntamento' => $model->oraAppuntamento, 'logopedista' => $model->logopedista]);
                        }
                    ],
                ],
            ]);
        } catch (Exception $e) {
            echo '<h2> Non sono presenti appuntamenti richiesti dai caregiver</h2>';
        }

    } else if ($actor == "caregiver"){

        $form = ActiveForm::begin();
        $model = new \app\models\PrenotazioneModel();

        echo $form->field($model, 'data')->widget(DatePicker::className(), [
                    'name' => 'data',
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => '',
                    'bsVersion' => '5',
                    'language' => 'it',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])->label('Data prenotazione');

        echo $form->field($model, 'ora')->widget(\kartik\time\TimePicker::className(), [
                'name' => 'ora',
                'bsVersion' => '5',
                'language' => 'it',
                'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 5
                ]
        ])->label('Ora prenotazione');

        Yii::warning($_COOKIE['caregiver']);

        $caregiver = $form->field($model, 'mailCaregiver')
            ->hiddenInput(['value' => $_COOKIE['caregiver']])->label(false);

        echo $caregiver;

        echo Html::submitButton('Richiedi prenotazione', ['class' => 'btn btn-success']);

        ActiveForm::end();
    } else {

    }
    ?>
