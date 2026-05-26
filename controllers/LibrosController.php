<?php

namespace app\controllers;

use app\models\Libros;
use app\models\LibrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibrosController implements the CRUD actions for Libros model.
 */
class LibrosController extends Controller
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
     * Lists all Libros models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LibrosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libros model.
     * @param int $idLibros Id Libros
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLibros)
    {
        return $this->render('view', [
            'model' => $this->findModel($idLibros),
        ]);
    }

    /**
     * Creates a new Libros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Libros();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idLibros' => $model->idLibros]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Libros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLibros Id Libros
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLibros)
    {
        $model = $this->findModel($idLibros);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLibros' => $model->idLibros]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLibros Id Libros
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLibros)
    {
        $this->findModel($idLibros)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Libros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLibros Id Libros
     * @return Libros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLibros)
    {
        if (($model = Libros::findOne(['idLibros' => $idLibros])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
