<?php

namespace app\controllers;

use Yii;
use app\models\Reservasala;
use app\models\ReservasalaBusca;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\Auth;

/**
 * ReservasalaController implements the CRUD actions for Reservasala model.
 */
class ReservasalaController extends Controller
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
                            Auth::NIVEL_USUARIO
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
     * Lists all Reservasala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReservasalaBusca();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservasala model.
     * @param integer $idReservasala
     * @param integer $idUsuario
     * @param integer $idSala
     * @return mixed
     */
    public function actionView($idReservaSala, $idUsuario, $idSala)
    {
        $reservaSala = new Reservasala();
        $model = $this->findModel($idReservaSala, $idUsuario, $idSala);

        return $this->render('view', [
            'model' => $model,
            'usuario' => $reservaSala->getUsuario($model->idUsuario),
            'sala' => $reservaSala->getSala($model->idSala),
        ]);
    }

    /**
     * Creates a new Reservasala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservasala();
        $data = Yii::$app->request->post();
        $find = "";

        if(!empty($data)) {
            $usuario = $data['Reservasala']['idUsuario'];
            $sala = $data['Reservasala']['idSala'];
            $periodo = $data['Reservasala']['periodo'];

            $periodoDecresc = date("Y-m-d H:i:s", strtotime('-1 hours', strtotime($periodo)));
            $periodoAcresc = date("Y-m-d H:i:s", strtotime('+1 hours', strtotime($periodo)));

            $find = Reservasala::find()->where('idSala = ' . $sala . ' AND periodo BETWEEN "' . $periodoDecresc . '" AND "' . $periodoAcresc . '"')->one();
        }

        if (empty($find)) {
            if ($model->load($data)) {
                $model->save();
                return $this->redirect(['view', 'idReservaSala' => $model->idReservaSala, 'idUsuario' => $model->idUsuario, 'idSala' => $model->idSala]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'error' => ''
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'error' => 'Sala já reservada para esse periodo'
            ]);
        }
    }

    /**
     * Updates an existing Reservasala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idReservasala
     * @param integer $idUsuario
     * @param integer $idSala
     * @return mixed
     */
    public function actionUpdate($idReservaSala, $idUsuario, $idSala)
    {
        $model = $this->findModel($idReservaSala, $idUsuario, $idSala);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            return $this->redirect(['view', 'idReservaSala' => $model->idReservaSala, 'idUsuario' => $model->idUsuario, 'idSala' => $model->idSala]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reservasala model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idReservaSala
     * @param integer $idUsuario
     * @param integer $idSala
     * @return mixed
     */
    public function actionDelete($idReservaSala, $idUsuario, $idSala)
    {
        $this->findModel($idReservaSala, $idUsuario, $idSala)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservasala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idReservaSala
     * @param integer $idUsuario
     * @param integer $idSala
     * @return Reservasala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idReservaSala, $idUsuario, $idSala)
    {
        if (($model = Reservasala::findOne(['idReservaSala' => $idReservaSala, 'idUsuario' => $idUsuario, 'idSala' => $idSala])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
