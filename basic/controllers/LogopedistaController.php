<?php

namespace app\controllers;

use yii\web\Controller;

class LogopedistaController extends Controller
{
    public function actionDashboardlogopedista() {
        $this->layout = 'logopedista';
        return $this->render('dashboardlogopedista', ['actor'=>'logopedista']);
    }


}