<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User\DashboardPengajuanLamaran;
use frontend\models\User\DashboardPengajuanLamaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardPengajuanLamaranController implements the CRUD actions for DashboardPengajuanLamaran model.
 */
class DashboardPengajuanLamaranController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-pengajuan-lamaran'] = true;
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
     * Lists all DashboardPengajuanLamaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            $searchModel = new DashboardPengajuanLamaranSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../dashboard/DashboardPengajuanLamaran/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardPengajuanLamaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest) {
            return $this->render('../dashboard/DashboardPengajuanLamaran/view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardPengajuanLamaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new DashboardPengajuanLamaran();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->lamaranID]);
//        }
//
//        return $this->render('../dashboard/DashboardPengajuanLamaran/create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing DashboardPengajuanLamaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->lamaranID]);
//        }
//
//        return $this->render('../dashboard/DashboardPengajuanLamaran/update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing DashboardPengajuanLamaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest) {
            if($this->findModel($id)['lamaranStatus'] == 'Pending Review') {
                $this->findModel($id)->delete();
                return $this->redirect(['index']);
            } else {
                return $this->redirect('index');
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the DashboardPengajuanLamaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardPengajuanLamaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardPengajuanLamaran::find()->where(['lamaranID' => $id,'lamaranUserID' => Yii::$app->user->identity->userID])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
