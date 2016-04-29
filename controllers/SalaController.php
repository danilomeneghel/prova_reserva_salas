<?php

namespace app\controllers;

use Yii;
use app\models\Sala;
use app\models\SalaBusca;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\Auth;

/**
 * SalaController implements the CRUD actions for Sala model.
 */
class SalaController extends Controller
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
     * Lists all Sala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalaBusca();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sala model.
     * @param integer $idSala
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Sala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sala();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'idSala' => $model->idSala]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idSala
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            
            return $this->redirect(['view', 'idSala' => $model->idSala]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sala model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idSala
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idSala
     * @return Sala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSala)
    {
        if (($model = Sala::findOne(['idSala' => $idSala])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
