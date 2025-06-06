<?php

namespace app\controllers;

use app\models\WorkshopTypeModel;
use app\models\WorkshopTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkshopTypeController implements the CRUD actions for WorkshopTypeModel model.
 */
class WorkshopTypeController extends Controller
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
     * Lists all WorkshopTypeModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkshopTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkshopTypeModel model.
     * @param int $ID_workshop_type Id Workshop Type
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_workshop_type)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_workshop_type),
        ]);
    }

    /**
     * Creates a new WorkshopTypeModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WorkshopTypeModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_workshop_type' => $model->ID_workshop_type]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkshopTypeModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_workshop_type Id Workshop Type
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_workshop_type)
    {
        $model = $this->findModel($ID_workshop_type);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_workshop_type' => $model->ID_workshop_type]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkshopTypeModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_workshop_type Id Workshop Type
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_workshop_type)
    {
        $this->findModel($ID_workshop_type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkshopTypeModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_workshop_type Id Workshop Type
     * @return WorkshopTypeModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_workshop_type)
    {
        if (($model = WorkshopTypeModel::findOne(['ID_workshop_type' => $ID_workshop_type])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
