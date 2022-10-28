<?php

namespace app\controllers;

use app\models\PrenotazioneModel;
use yii\web\Controller;
use yii\data\SqlDataProvider;

class PrenotazioneController extends Controller
{
    public function actionVistaprenotazioni($actor) {

        if ($actor == 'logopedista') {

            $dataProvider = new SqlDataProvider([
                'sql' => 'SELECT * FROM Appuntamento WHERE Conferma=0',
            ]);
            return $this->render('vistaprenotazioni', ['actor' => $actor, 'dataProvider' => $dataProvider]);
        }
        else if ($actor == 'caregiver') {

            if ($this->request->isPost) {
                $post = $this->request->post();
                $model = new PrenotazioneModel();
                $model->load($post);
                $model->save();
            }
            return $this->render('vistaprenotazioni', ['actor' => $actor]);
        }
        else {
            return $this->render('@views/site/error');
        }
    }
}