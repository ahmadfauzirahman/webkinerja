<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebJenjangPendidikan;
use common\models\WebJenjangPendidikanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebJenjangPendidikanController implements the CRUD actions for WebJenjangPendidikan model.
 */
class WebJenjangPendidikanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return Auth::behaviors([
            'deny' => function ($rule, $action) {
                $this->redirect(['site/login']);
            },
        ]);
    }

    /**
     * Lists all WebJenjangPendidikan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebJenjangPendidikanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebJenjangPendidikan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = Auth::getRole();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WebJenjangPendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new WebJenjangPendidikan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jenjangPendidikanID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WebJenjangPendidikan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jenjangPendidikanID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebJenjangPendidikan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WebJenjangPendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebJenjangPendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebJenjangPendidikan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
