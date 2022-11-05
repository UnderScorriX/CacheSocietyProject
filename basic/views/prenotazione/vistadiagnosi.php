<?php

/** @var $dataProvider yii\data\ActiveDataProvider */

use app\models\DiagnosiModel;
use app\models\PrenotazioneModel;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/*try {*/
    echo "<br><p>Carica il file della diagnosi e successivamente seleziona l'appuntamento corrispondente:</p>";

    echo Html::beginForm(method: 'post');

    //Yii::warning($dataProvider->getModels());

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'data',
            'ora',
            'mailUtente',
            'mailCaregiver',
            [
                'attribute' => 'Carica diagnosi',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::fileInput('file');
                }
            ],
            [
                'class' => 'yii\grid\RadioButtonColumn',
                'header' => "Seleziona appuntamento",
                'radioOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model['id']];
                }
            ],
        ],
    ]);

    echo Html::submitButton('Allega',['class' => 'btn btn-primary mb-2']);

    echo Html::endForm();

    echo Html::a('Torna alla dashboard', ['/logopedista/dashboardlogopedista'], ['class' => 'btn btn-outline-primary']);

/*} catch (Exception $e) {
    Yii::error($e);
}*/

?>