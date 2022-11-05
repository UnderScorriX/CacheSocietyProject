<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var $actor string */
/** @var $mail string */
/** @var $dataProvider yii\data\ActiveDataProvider */

use app\models\CaregiverModel;
use app\models\PrenotazioneModel;
use app\models\UtenteModel;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


$this->title = 'Appuntamenti';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php

    if ($actor == "logopedista"){
            try {
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'data',
                        'ora',
                        'mailUtente',
                        'mailCaregiver',
                        [
                            'class' => ActionColumn::className(),
                            'header' => 'Conferma appuntamento',
                            'visibleButtons' => [
                                'view' => false,
                                'delete' => false,
                                'update' => true
                            ],
                            'urlCreator' => function ($action, $model, $key, $index, $column) {
                                $url = $action;

                                if ($action == 'update') {
                                    $url = 'vistaprenotazioni';
                                }
                                return Url::toRoute([$url,
                                    'actor' => 'logopedista',
                                    'data' => $model['data'],
                                    'ora' => $model['ora'],
                                    'mailUtente' => $model['mailUtente'],
                                    'mailCaregiver' => $model['mailCaregiver']
                                ]);
                            }
                        ],
                    ],
                ]);
            } catch (Exception $e) {
                echo '<h2> Non sono presenti appuntamenti richiesti dai caregiver</h2>';
                Yii::error($e);
            }
            echo Html::a('Torna alla dashboard', ['/logopedista/dashboardlogopedista'], ['class' => 'btn btn-outline-primary']);
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

        $caregivers = ArrayHelper::toArray(CaregiverModel::find()
            ->select(['utenteAss'])
            ->where(['mail' => $_COOKIE['caregiver']])
            ->all());

        $utenteAssociato = CaregiverModel::find()->select('utenteAss')->where(['mail' => $_COOKIE['caregiver']])->one();

        $utente = $form->field($model, 'mailUtente')
            ->hiddenInput(['value' => $utenteAssociato['utenteAss']])->label(false);

        echo $utente;

        $logopedistaAssociato = UtenteModel::find()->select('logopedista')->where(['mail' => $utenteAssociato['utenteAss']])->one();

        $logopedista = $form->field($model, 'mailLogopedista')
            ->hiddenInput(['value' => $logopedistaAssociato['logopedista']])->label(false);

        echo $logopedista;

        echo Html::submitButton('Richiedi prenotazione', ['class' => 'btn btn-success']);

        ActiveForm::end();

        echo "<br><p>Le tue attuali prenotazioni:</p>";

        try {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'data',
                    'ora',
                    'mailUtente',
                    'mailLogopedista',
                    [
                        'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                        'value' => function ($model) {
                            if($model['conferma'] == 0)
                                return "Non confermata";
                            return "Confermata";
                        },
                    ],
                ],
            ]);
        } catch (Exception $e) {
            echo '<h2> Non sono presenti appuntamenti da te richiesti</h2>';
            Yii::error($e);
        }
    } else {
        //IDK
    }
    ?>
