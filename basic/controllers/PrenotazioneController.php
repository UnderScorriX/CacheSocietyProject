<?php

namespace app\controllers;

use app\models\DiagnosiModel;
use app\models\PrenotazioneModel;
use Yii;
use yii\web\Controller;
use yii\data\SqlDataProvider;

class PrenotazioneController extends Controller
{
    public function actionVistaprenotazioni($actor) {

        Yii::error($actor);

        if ($actor == 'logopedista') {
            $this->layout = 'logopedista';

            if (!empty($_GET['data']) && !empty($_GET['mailCaregiver']) && !empty($_GET['ora'])) {
                $data = print_r($_GET);

                $query = PrenotazioneModel::find()
                    ->where([
                        'data' => $_GET['data'],
                        'ora' => $_GET['ora'],
                        'mailCaregiver' => $_GET['mailCaregiver']
                    ]);
                $model = $query->one();
                $model->conferma = 1;
                $model->save();
            }

            $dataProvider = new SqlDataProvider([
                'sql' => "SELECT * FROM Prenotazione WHERE Conferma=0 AND mailLogopedista='".$_COOKIE['logopedista']."'",
            ]);
            return $this->render('vistaprenotazioni', ['actor' => $actor, 'dataProvider' => $dataProvider]);
        }
        else if ($actor == 'caregiver') {

            $this->layout = 'caregiver';

            if ($this->request->isPost) {
                $data = $this->request->post();
                $model = new PrenotazioneModel();
                $model->load($data);
                try{
                    $model->save();
                }
                catch (\Exception $e) {
                    Yii::$app->getSession()
                        ->setFlash('danger', 'Orario e data già riservati ad altri appuntamenti');
                }
            }
            $dataProvider = new SqlDataProvider([
                'sql' => "SELECT * FROM Prenotazione WHERE mailCaregiver='".$_COOKIE['caregiver']."'",
            ]);
            return $this->render('vistaprenotazioni', ['actor' => $actor, 'dataProvider' => $dataProvider]);
        }
        else {
            return $this->render('/site/error',['name'=>'Errore','message'=>"Impossibile trovare l'attore?"]);
        }
    }

    public function actionVistadiagnosi() {
        $data = Yii::$app->request->post();

        if (!empty($data)) {

            Yii::warning($data);

            Yii::warning($_FILES);

            //CREATE DIRECTORY IF NOT EXISTS
            $path = realpath("ArchivioDiagnosi");

            if (!$path || !is_dir($path)) {
                mkdir("ArchivioDiagnosi");
            }

            $prenModel = PrenotazioneModel::findByID($data['radioButtonSelection']);
            $diagnosiModel = new DiagnosiModel();

            Yii::error($data['file']);

            //FILL MODELS

            //$diagnosiModel->setFile($data['file']);
            //$diagnosiModel->setSaveFile($prenModel->id,$prenModel->data,$prenModel->ora);

            //$diagnosiModel->save();
        }

        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT * FROM Prenotazione WHERE Conferma=1 AND mailLogopedista='".$_COOKIE['logopedista']."'",
        ]);

        return $this->render('vistadiagnosi', ['dataProvider' => $dataProvider]);
    }
}