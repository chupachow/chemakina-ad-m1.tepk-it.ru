<?php

namespace app\controllers;

use app\models\ProductWorkshopModel;
use app\models\ProductWorkshopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductWorkshopController implements the CRUD actions for ProductWorkshopModel model.
 */
class ProductWorkshopController extends Controller
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
     * Lists all ProductWorkshopModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductWorkshopSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductWorkshopModel model.
     * @param int $ID_product_workshop Id Product Workshop
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_product_workshop)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_product_workshop),
        ]);
    }

    /**
     * Creates a new ProductWorkshopModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductWorkshopModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_product_workshop' => $model->ID_product_workshop]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductWorkshopModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_product_workshop Id Product Workshop
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_product_workshop)
    {
        $model = $this->findModel($ID_product_workshop);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_product_workshop' => $model->ID_product_workshop]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductWorkshopModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_product_workshop Id Product Workshop
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_product_workshop)
    {
        $this->findModel($ID_product_workshop)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductWorkshopModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_product_workshop Id Product Workshop
     * @return ProductWorkshopModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_product_workshop)
    {
        if (($model = ProductWorkshopModel::findOne(['ID_product_workshop' => $ID_product_workshop])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
