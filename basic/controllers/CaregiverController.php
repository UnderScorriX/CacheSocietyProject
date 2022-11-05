<?php

namespace app\controllers;


use app\models\CaregiverModel;
use app\models\LogopedistaModel;
use app\models\UtenteModel;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

class CaregiverController extends Controller
{
    public function actionDashboardcaregiver() {
        $this->layout = 'caregiver';
        return $this->render('dashboardcaregiver');
    }

    public function actionVistaassociazionelogopedista() {
        $this->layout = 'caregiver';

        $data = Yii::$app->request->post();

        if(!empty($data)){

            Yii::error($data);

            $model = UtenteModel::findOne(['mail' => $data['utente']]);

            $model->logopedista = $data['logopedista'];

            $model->save();
        }

        $logopedisti = ArrayHelper::toArray(LogopedistaModel::find()->all());

        $caregivers = ArrayHelper::toArray(CaregiverModel::find()
            ->select(['utenteAss'])
            ->where(['mail' => $_COOKIE['caregiver']])
            ->all());

        $query = UtenteModel::find()->orWhere(['like','mail', $caregivers[0]]);

        $utenti = $query->all();

        Yii::error($utenti);

        return $this->render('vistaassociazionelogopedista',[
            'logopedisti' => $logopedisti,
            'utenti' => $utenti
        ]);
    }

}