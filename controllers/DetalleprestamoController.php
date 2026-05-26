<?php

namespace app\controllers;

use app\models\Detalleprestamo;
use app\models\DetalleprestamoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleprestamoController implements the CRUD actions for Detalleprestamo model.
 */
class DetalleprestamoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Detalleprestamo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetalleprestamoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalleprestamo model.
     * @param int $idprestamo Idprestamo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idprestamo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idprestamo),
        ]);
    }

    /**
     * Creates a new Detalleprestamo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detalleprestamo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idprestamo' => $model->idprestamo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detalleprestamo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idprestamo Idprestamo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idprestamo)
    {
        $model = $this->findModel($idprestamo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idprestamo' => $model->idprestamo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detalleprestamo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idprestamo Idprestamo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idprestamo)
    {
        $this->findModel($idprestamo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detalleprestamo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idprestamo Idprestamo
     * @return Detalleprestamo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idprestamo)
    {
        if (($model = Detalleprestamo::findOne(['idprestamo' => $idprestamo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
