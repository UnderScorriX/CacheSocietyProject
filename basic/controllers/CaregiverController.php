<?php

namespace app\controllers;


use yii\web\Controller;

class CaregiverController extends Controller
{
    public function actionDashboardcaregiver() {
        $this->layout = 'caregiver';
        return $this->render('dashboardcaregiver');
    }
}