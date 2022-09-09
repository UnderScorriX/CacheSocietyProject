<?php

namespace app\controllers;

use app\models\LogopedistaModel;
use http\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin($actor)
    {
        if(!empty(Yii::$app->request->post())){
            $form = new LoginForm($actor);
            $data = Yii::$app->request->post();
            $form -> load($data);
            try {
                if(($actor == 'logopedista')){
                    $form->login();
                    $cookie_name = "logopedista";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    //$this->redirect('/logopedista/dashboardlogopedista?tipoAttore=');
                } elseif(($actor == 'utente')){
                    $form->login();
                    $cookie_name = "utente";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    //$this->redirect('/logopedista/dashboardlogopedista?tipoAttore=');
                } elseif(($actor == 'caregiver')){
                    $form->login();
                    $cookie_name = "caregiver";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    //$this->redirect('/logopedista/dashboardlogopedista?tipoAttore=');
                } else Yii::error("forse hai sbagliato lavoro");



            } catch(\Exception $e) {
                Yii::error();
            }
        }
        return $this->render('login', [
            'model' => $form,
        ]);

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister($actor)
    {
        if(!empty(Yii::$app->request->post())){
            try {
                if($actor == 'logopedista') $model = new \app\models\LogopedistaModel();
                else if($actor == 'utente') $model = new \app\models\UtenteModel();
                else if($actor == 'caregiver') $model = new \app\models\CaregiverModel();
                else Yii::error("forse hai sbagliato lavoro");
                $model->load(Yii::$app->request->post());
                $model->insert();

                return $this->render('@app/views/site/about');
            } catch(\Exception $e) {
                Yii::error();
            }
        }

        return $this->render('register', ['actor'=>$actor]);

    }
}