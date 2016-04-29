<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\Usuarioemail;
use app\models\UsuarioBusca;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\Auth;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioBusca();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);        
        
        return $this->render('view', [
            'model' => $model,
            'sexo' => $this->getSexo($model->sexo),
        ]);
    }

    public function getSexo($sexo) {
        if($sexo == "m")
            return "Masculino";
        else 
            return "Feminino";
    }
    
    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();
        $modelsEmail = [new Usuarioemail];

        if ($model->load(Yii::$app->request->post())) {

            $modelsEmail = Model::createMultiple(Usuarioemail::classname());
            
            Model::loadMultiple($modelsEmail, Yii::$app->request->post());
                        
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsEmail as $modelEmail) {
                            $modelEmail->idUsuario = $model->idUsuario;
                            if (! ($flag = $modelEmail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idUsuario]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsEmail' => (empty($modelsEmail)) ? [new Usuarioemail] : $modelsEmail,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);        
        $modelsEmail = $model->usuarioEmails;
        $idSecundario = 'idUsuarioEmail';
        
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsEmail, $idSecundario, $idSecundario);
            $modelsEmail = Model::createMultiple(Usuarioemail::classname(), $modelsEmail, $idSecundario, $idSecundario);
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsEmail, $idSecundario, $idSecundario)));
            
            Model::loadMultiple($modelsEmail, Yii::$app->request->post());
            
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Usuarioemail::deleteAll([$idSecundario => $deletedIDs]);
                        }
                        foreach ($modelsEmail as $modelEmail) {
                            $modelEmail->idUsuario = $model->idUsuario;
                            if (! ($flag = $modelEmail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idUsuario]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsEmail' => (empty($modelsEmail)) ? [new Usuarioemail] : $modelsEmail,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
