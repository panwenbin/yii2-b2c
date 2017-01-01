<?php

namespace backend\controllers;

use common\models\gii\ProductDetail;
use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $product = new Product();
        $productDetail = new ProductDetail();

        if ($product->load(Yii::$app->request->post())
            && $productDetail->load(Yii::$app->request->post())
            && $product->validate()
            && $productDetail->validate()
        ) {
            Yii::$app->db->transaction(function ($db) use ($product, $productDetail) {
                $product->save();
                $product->link('productDetail', $productDetail);
            });
            return $this->redirect(['view', 'id' => $product->id]);
        } else {
            return $this->render('create', [
                'model' => $product,
                'productDetail' => $productDetail,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $product = $this->findModel($id);
        $productDetail = $product->productDetail;

        if ($product->load(Yii::$app->request->post())
            && $productDetail->load(Yii::$app->request->post())
            && $product->validate()
            && $productDetail->validate()
        ) {
            Yii::$app->db->transaction(function ($db) use ($product, $productDetail) {
                $product->save(false);
                $productDetail->save(false);
            });
            return $this->redirect(['view', 'id' => $product->id]);
        } else {
            return $this->render('update', [
                'model' => $product,
                'productDetail' => $productDetail,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
