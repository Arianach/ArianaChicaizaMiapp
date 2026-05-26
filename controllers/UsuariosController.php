<?php

namespace app\controllers;

use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
     * Lists all Usuarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param int $idusuario Idusuario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idusuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idusuario),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idusuario' => $model->idusuario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idusuario Idusuario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idusuario)
    {
        $model = $this->findModel($idusuario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idusuario' => $model->idusuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idusuario Idusuario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idusuario)
    {
        $this->findModel($idusuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idusuario Idusuario
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idusuario)
    {
        if (($model = Usuarios::findOne(['idusuario' => $idusuario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
