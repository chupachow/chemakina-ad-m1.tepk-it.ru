<?php

namespace app\controllers;

use app\models\WorkshopModel;
use app\models\WorkshopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkshopController implements the CRUD actions for WorkshopModel model.
 */
class WorkshopController extends Controller
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
     * Lists all WorkshopModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkshopSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkshopModel model.
     * @param int $ID_workshop Id Workshop
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_workshop)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_workshop),
        ]);
    }

    /**
     * Creates a new WorkshopModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WorkshopModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_workshop' => $model->ID_workshop]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkshopModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_workshop Id Workshop
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_workshop)
    {
        $model = $this->findModel($ID_workshop);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_workshop' => $model->ID_workshop]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkshopModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_workshop Id Workshop
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_workshop)
    {
        $this->findModel($ID_workshop)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkshopModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_workshop Id Workshop
     * @return WorkshopModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_workshop)
    {
        if (($model = WorkshopModel::findOne(['ID_workshop' => $ID_workshop])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
