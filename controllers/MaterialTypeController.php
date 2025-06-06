<?php

namespace app\controllers;

use app\models\MaterialTypeModel;
use app\models\MaterialTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialTypeController implements the CRUD actions for MaterialTypeModel model.
 */
class MaterialTypeController extends Controller
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
     * Lists all MaterialTypeModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MaterialTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialTypeModel model.
     * @param int $ID_material_type Id Material Type
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_material_type)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_material_type),
        ]);
    }

    /**
     * Creates a new MaterialTypeModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MaterialTypeModel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_material_type' => $model->ID_material_type]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MaterialTypeModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_material_type Id Material Type
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_material_type)
    {
        $model = $this->findModel($ID_material_type);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_material_type' => $model->ID_material_type]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MaterialTypeModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_material_type Id Material Type
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_material_type)
    {
        $this->findModel($ID_material_type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialTypeModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_material_type Id Material Type
     * @return MaterialTypeModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_material_type)
    {
        if (($model = MaterialTypeModel::findOne(['ID_material_type' => $ID_material_type])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
