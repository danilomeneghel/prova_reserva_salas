<?php

namespace app\controllers;

use Yii;
use app\models\Login;
use app\models\LoginBusca;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\Auth;

/**
 * LoginController implements the CRUD actions for Login model.
 */
class LoginController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::classname(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only'=>[],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => [
                            Auth::NIVEL_ADMIN,
                            Auth::NIVEL_GERENTE,
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
    
    /**
     * Lists all Login models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LoginBusca();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Login model.
     * @param integer $idLogin
     * @param integer $idUsuario
     * @return mixed
     */
    public function actionView($idLogin, $idUsuario)
    {
        $model = $this->findModel($idLogin, $idUsuario);
        
        return $this->render('view', [
            'model' => $model,
            'nivel' => $this->getNivel($model->nivel),
        ]);
    }

    public function getNivel($nivel) {
        if($nivel == 1)
            return "Administrador";
        else if($nivel == 2)
            return "Gerente";
        else 
            return "Usuário";
    }

    /**
     * Creates a new Login model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Login();

        if ($model->load(Yii::$app->request->post())) {
            $model->senha = sha1($model->senha);
            $model->save();
            return $this->redirect(['view', 'idLogin' => $model->idLogin, 'idUsuario' => $model->idUsuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Login model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idLogin
     * @param integer $idUsuario
     * @return mixed
     */
    public function actionUpdate($idLogin, $idUsuario)
    {
        $model = $this->findModel($idLogin, $idUsuario);

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($model->senha))
                $model->senha = sha1($model->senha);
            $model->save();
            
            return $this->redirect(['view', 'idLogin' => $model->idLogin, 'idUsuario' => $model->idUsuario]);
        } else {
            $model->senha = null;
            
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Login model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idLogin
     * @param integer $idUsuario
     * @return mixed
     */
    public function actionDelete($idLogin, $idUsuario)
    {
        $this->findModel($idLogin, $idUsuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Login model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idLogin
     * @param integer $idUsuario
     * @return Login the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLogin, $idUsuario)
    {
        if (($model = Login::findOne(['idLogin' => $idLogin, 'idUsuario' => $idUsuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
