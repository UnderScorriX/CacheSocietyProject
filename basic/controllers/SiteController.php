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
        $form = new LoginForm();
        if(!empty(Yii::$app->request->post())){
            $data = Yii::$app->request->post();

            Yii::error($data);

            $form -> load($data);

            Yii::error($form->getAttributes());

            try {
                if($actor == 'logopedista'){
                    $form->login();
                    $cookie_name = "logopedista";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    $this->redirect('/logopedista/dashboardlogopedista');
                } elseif($actor == 'utente'){
                    $form->login();
                    $cookie_name = "utente";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    $this->redirect('/utente/dashboardutente');
                } elseif($actor == 'caregiver'){
                    $form->login();
                    $cookie_name = "caregiver";
                    $cookie_value = $data['LoginForm']['mail'];
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    $this->redirect('/caregiver/dashboardcaregiver');
                } else Yii::error("Forse hai sbagliato lavoro");



            } catch(\Exception $e) {
                Yii::error($e);
            }
        }
        return $this->render('login', [
            'model' => $form,
            'actor' => $actor
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        if (isset($_COOKIE['caregiver']))
            setcookie('caregiver', time() - 3600);
        if (isset($_COOKIE['utente']))
            setcookie('utente', time() - 3600);
        if (isset($_COOKIE['logopedista']))
            setcookie('logopedista', time() - 3600);

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

                Yii::error(Yii::$app->request->post());

                //return $this->render('@app/views/site/about');
            } catch(\Exception $e) {
                Yii::error("Errore non specificato");
            }
        }

        return $this->render('register', ['actor'=>$actor]);

    }

    public function actionDownload()
    {
        clearstatcache();
        $file = Yii::$app->request->get('file');
        $path = Yii::$app->request->get('path');
        $root = Yii::getAlias('@webroot') . $path . $file;

        if (file_exists($root)) {
            return Yii::$app->response->sendFile($root);
        } else {
            throw new \yii\web\NotFoundHttpException("{$file} is not found!");
        }
    }
}