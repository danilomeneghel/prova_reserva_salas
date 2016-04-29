<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\LoginAcesso;
use app\models\SuporteForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\Auth;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::classname(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only'=>['index'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => [
                            Auth::NIVEL_ADMIN,
                            Auth::NIVEL_GERENTE,
                            Auth::NIVEL_USUARIO,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $model2 = new LoginAcesso();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $model2->idUsuario = Yii::$app->user->identity->idUsuario;
            $model2->idLogin = Yii::$app->user->identity->idLogin;
            $model2->save();
            return $this->goBack();
        }
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSuporte()
    {
        $model = new SuporteForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('suporteForm');

            return $this->refresh();
        }
        return $this->render('suporte', [
            'model' => $model,
        ]);
    }
}
