<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dashboard\DashboardLowongan;
use frontend\models\Dashboard\DashboardLowonganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardLowonganController implements the CRUD actions for DashboardLowongan model.
 */
class DashboardLowonganController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-lowongan'] = true;
        $this->layout = 'dashboard';
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
     * Lists all DashboardLowongan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DashboardLowonganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('../dashboard/DashboardLowongan/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DashboardLowongan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('../dashboard/DashboardLowongan/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DashboardLowongan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DashboardLowongan();

        if ($model->load(Yii::$app->request->post())) {
            $model->lowonganJenjangPendidikan = json_encode($model->lowonganJenjangPendidikan);
            $model->lowonganJurusan = json_encode($model->lowonganJurusan);
            $model->lowonganTglPost = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->lowonganID]);
        }

        return $this->render('../dashboard/DashboardLowongan/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DashboardLowongan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->lowonganJenjangPendidikan = json_encode($model->lowonganJenjangPendidikan);
            $model->lowonganJurusan = json_encode($model->lowonganJurusan);
            $model->save();
            return $this->redirect(['view', 'id' => $model->lowonganID]);
        }

        return $this->render('../dashboard/DashboardLowongan/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DashboardLowongan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DashboardLowongan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardLowongan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardLowongan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
