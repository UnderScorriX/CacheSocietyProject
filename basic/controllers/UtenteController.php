<?php

namespace app\controllers;

use app\models\CaregiverModel;
use app\models\SoluzioniModel;
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

    public function actionSvolgiesercizio(){
    $this -> layout = "utente";
        $data = Yii::$app->request->post();
        if(!empty($data)){
            $model = new SoluzioniModel();
            $model -> load($data);
            if (strtolower($model->soluzione1) == "cocco"){
                if (strtolower($model->soluzione2) == "gatto"){
                    if (strtolower($model->soluzione3) == "cane"){
                        if (strtolower($model->soluzione4) == "mela"){
                            Yii::$app->getSession()->setFlash('success', 'Esercizio completato!');
                        } else {
                            Yii::$app->getSession()->setFlash('danger', 'Risposta sbagliata! Riprova');
                        }
                    } else {
                        Yii::$app->getSession()->setFlash('danger', 'Risposta sbagliata! Riprova');
                    }
                } else {
                    Yii::$app->getSession()->setFlash('danger', 'Risposta sbagliata! Riprova');
                }
            } else {
                Yii::$app->getSession() ->setFlash('danger', 'Risposta sbagliata! Riprova');
            }
            Yii::error($model->soluzione1);
        }
        return $this->render('svolgiesercizio', ['model'=>new SoluzioniModel()]);
    }


}