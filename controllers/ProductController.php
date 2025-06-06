<?php

namespace app\controllers;

use app\models\ProductModel;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for ProductModel model.
 */
class ProductController extends Controller
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
     * Lists all ProductModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductModel model.
     * @param int $ID_product Id Product
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_product)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_product),
        ]);
    }

    /**
     * Creates a new ProductModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_product' => $model->ID_product]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_product Id Product
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_product)
    {
        $model = $this->findModel($ID_product);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_product' => $model->ID_product]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_product Id Product
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_product)
    {
        $this->findModel($ID_product)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_product Id Product
     * @return ProductModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_product)
    {
        if (($model = ProductModel::findOne(['ID_product' => $ID_product])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
