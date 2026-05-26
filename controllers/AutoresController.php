<?php

namespace app\controllers;

use app\models\Autores;
use app\models\AutoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AutoresController implements the CRUD actions for Autores model.
 */
class AutoresController extends Controller
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
     * Lists all Autores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AutoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autores model.
     * @param int $idautores Idautores
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idautores)
    {
        return $this->render('view', [
            'model' => $this->findModel($idautores),
        ]);
    }

    /**
     * Creates a new Autores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Autores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idautores' => $model->idautores]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Autores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idautores Idautores
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idautores)
    {
        $model = $this->findModel($idautores);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idautores' => $model->idautores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Autores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idautores Idautores
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idautores)
    {
        $this->findModel($idautores)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Autores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idautores Idautores
     * @return Autores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idautores)
    {
        if (($model = Autores::findOne(['idautores' => $idautores])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
