<?php

namespace app\controllers;

use app\models\CaregiverModel;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class UtenteController extends Controller
{
    public function actionDashboardutente()
    {
        $this->layout = 'utente';
        return $this->render('dashboardutente', ['actor' => 'utente']);
    }

    public function actionVistaassociazionecaregiver() {
        $this->layout = 'utente';

        $data = Yii::$app->request->post();

        if(!empty($data)){

            Yii::error($data);

            $model = CaregiverModel::findOne(['mail' => $data['caregiver']]);

            $model->utenteAss = $_COOKIE['utente'];

            $model->save();
        }

        $caregivers = ArrayHelper::toArray(CaregiverModel::find()->all());

        return $this->render('vistaassociazionecaregiver',[
            'caregivers' => $caregivers
        ]);
    }


}