<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Parser;
use app\models\SignupForm;
use app\models\Unit;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
     * Функция для отображения домашней страницы.
     * 
     * @return string
     */
    public function actionIndex()
    {
        $querySelectUnit = Unit::find();
        $dataControllResult = $querySelectUnit->orderBy('name')->all();
        return $this->render('index', ['units' => $dataControllResult]);
    }

    /**
     * Функция для отображения страницы авторизации пользователя в системе.
     * 
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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
     * Функция для отображения страницы регистрации пользователя в системе.
     * 
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Функция для выхода из профиля пользователя.
     * Переадресация на домашнею (главную) страницу.
     * 
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Функция для отображения списка компонентов обновления остатков.
     * 
     * @return mixed
     */
    public function actionLog()
    {
        $parser = new Parser();
        $querySelectOneUnit = Unit::findOne($_GET['unit']);
        $selectUrl = $querySelectOneUnit->pathApi;

        $json = $parser->jsonParcer($selectUrl);
        $statistics = $parser->compilingStatistics($json);
      
        return $this->render('log',[
            'unit' => $querySelectOneUnit,
            'data' => $json,
            'error' => $statistics['error'],
            'success' => $statistics['success'],
            'url' => $selectUrl,
            'statusError' => $parser->errorStatus,
        ]);
    }

    /**
     * Функция для отображения подробной информации о выбранном 
     * компоненте обновления остатков.
     * 
     * @return mixed
     */
    public function actionView()
    {   
        $parser = new Parser();
        $data = $parser->jsonParcer($_GET['url']);
        
        foreach($data as $element){
            if($element[1] == $_GET['name']){
                $item = $element;
            }
        }
        return $this->render('view',[
            'item' => $item,
            'statusError' => $parser->errorStatus,
            'unit' => $_GET['unit'],
        ]);
    }
}
