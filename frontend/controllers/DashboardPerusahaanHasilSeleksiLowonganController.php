<?php

namespace frontend\controllers;

use frontend\models\Dashboard\DashboardPerusahaanLamaran;
use Yii;
use frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan;
use frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowonganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardPerusahaanHasilSeleksiLowonganController implements the CRUD actions for DashboardPerusahaanHasilSeleksiLowongan model.
 */
class DashboardPerusahaanHasilSeleksiLowonganController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-hasil-seleksi'] = true;
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
     * Lists all DashboardPerusahaanHasilSeleksiLowongan models.
     * @return mixed
     */
    public function actionIndex($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-hasil-seleksi']);
            } else {
                $lowonganid = $lowongan;
                $searchModel = new DashboardPerusahaanHasilSeleksiLowonganSearch(['hasilSeleksiLowonganID' => $lowonganid]);
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('../dashboard/DashboardPerusahaanHasilSeleksiLowongan/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'lowongan' => $lowongan,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardPerusahaanHasilSeleksiLowongan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-hasil-seleksi']);
            } else {
                $lowonganid = $lowongan;
                return $this->render('../dashboard/DashboardPerusahaanHasilSeleksiLowongan/view', [
                    'model' => $this->findModel($id),
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardPerusahaanHasilSeleksiLowongan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-hasil-seleksi']);
            } else {
                $lowonganid = $lowongan;
                $model = new DashboardPerusahaanHasilSeleksiLowongan();

                if ($model->load(Yii::$app->request->post())) {
                    $model->hasilSeleksiUserID = DashboardPerusahaanLamaran::findOne($model->hasilSeleksiLamaranID)['lamaranUserID'];
                    $model->hasilSeleksiLowonganID = $lowonganid;
                    $model->hasilSeleksiHasil = json_encode($model->hasilSeleksiHasil);
//                    echo "<pre>";
//                    print_r($model);
//                    exit();
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->hasilSeleksiID, 'lowongan' => $lowonganid]);
                }

                return $this->render('../dashboard/DashboardPerusahaanHasilSeleksiLowongan/create', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing DashboardPerusahaanHasilSeleksiLowongan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-hasil-seleksi']);
            } else {
                $lowonganid = $lowongan;
                $model = $this->findModel($id);

                $model->hasilSeleksiHasil = json_decode($model->hasilSeleksiHasil);
                if ($model->load(Yii::$app->request->post())) {
                    $model->hasilSeleksiUserID = DashboardPerusahaanLamaran::findOne($model->hasilSeleksiLamaranID)['lamaranUserID'];
                    $model->hasilSeleksiHasil = json_encode($model->hasilSeleksiHasil);
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->hasilSeleksiID, 'lowongan' => $lowonganid]);
                }

                return $this->render('../dashboard/DashboardPerusahaanHasilSeleksiLowongan/update', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardPerusahaanHasilSeleksiLowongan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-hasil-seleksi']);
            } else {
                $lowonganid = $lowongan;
                $this->findModel($id)->delete();

                return $this->redirect(['index', 'lowongan' => $lowonganid]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the DashboardPerusahaanHasilSeleksiLowongan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardPerusahaanHasilSeleksiLowongan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardPerusahaanHasilSeleksiLowongan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
