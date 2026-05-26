<?php

namespace app\controllers;

use app\models\Prestamos;
use app\models\PrestamosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrestamosController implements the CRUD actions for Prestamos model.
 */
class PrestamosController extends Controller
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
     * Lists all Prestamos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PrestamosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prestamos model.
     * @param int $idPrestamos Id Prestamos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPrestamos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPrestamos),
        ]);
    }

    /**
     * Creates a new Prestamos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Prestamos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idPrestamos' => $model->idPrestamos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prestamos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPrestamos Id Prestamos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPrestamos)
    {
        $model = $this->findModel($idPrestamos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPrestamos' => $model->idPrestamos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prestamos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPrestamos Id Prestamos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPrestamos)
    {
        $this->findModel($idPrestamos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prestamos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPrestamos Id Prestamos
     * @return Prestamos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPrestamos)
    {
        if (($model = Prestamos::findOne(['idPrestamos' => $idPrestamos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
