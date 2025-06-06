<?php

namespace app\controllers;

use app\models\ProductTypeModel;
use app\models\ProductTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductTypeController implements the CRUD actions for ProductTypeModel model.
 */
class ProductTypeController extends Controller
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
     * Lists all ProductTypeModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTypeModel model.
     * @param int $ID_product_type Id Product Type
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_product_type)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_product_type),
        ]);
    }

    /**
     * Creates a new ProductTypeModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductTypeModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_product_type' => $model->ID_product_type]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTypeModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_product_type Id Product Type
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_product_type)
    {
        $model = $this->findModel($ID_product_type);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_product_type' => $model->ID_product_type]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTypeModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_product_type Id Product Type
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_product_type)
    {
        $this->findModel($ID_product_type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTypeModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_product_type Id Product Type
     * @return ProductTypeModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_product_type)
    {
        if (($model = ProductTypeModel::findOne(['ID_product_type' => $ID_product_type])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
