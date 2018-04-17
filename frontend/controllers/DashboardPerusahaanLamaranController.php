<?php

namespace frontend\controllers;

use frontend\models\Dashboard\DashboardLowongan;
use frontend\models\Dashboard\DashboardPerusahaan;
use Yii;
use frontend\models\Dashboard\DashboardPerusahaanLamaran;
use frontend\models\Dashboard\DashboardPerusahaanLamaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardPerusahaanLamaranController implements the CRUD actions for DashboardPerusahaanLamaran model.
 */
class DashboardPerusahaanLamaranController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-pelamar'] = true;
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
     * Lists all DashboardPerusahaanLamaran models.
     * @return mixed
     */
    public function actionIndex($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;

                $cekLowongan = DashboardLowongan::findOne($lowonganid);
                if (count($cekLowongan) != null) {
                    $cekPemilikPerusahaan = DashboardPerusahaan::find()->where(['perusahaanID' => $cekLowongan['lowonganPerusahaanID']])->one();
                    if ($cekPemilikPerusahaan->perusahaanUserID == Yii::$app->user->identity->userID) {
                        $searchModel = new DashboardPerusahaanLamaranSearch(['lamaranLowonganID' => $lowonganid]);
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        return $this->render('../dashboard/DashboardPerusahaanLamaran/index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'lowongan' => $lowonganid,
                        ]);
                    } else {
                        return $this->redirect(['/dashboard-perusahaan-pelamar']);
                    }
                } else {
                    return $this->redirect(['/dashboard-perusahaan-pelamar']);
                }
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionStatus($id,$lowongan = null,$tipe)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;
                $model = $this->findModel($id);
                    if($tipe != null || $tipe != '') {
                        if ($tipe == 0) {
                            $model->lamaranStatus = 'Ditolak';
                        } elseif ($tipe == 1) {
                            $model->lamaranStatus = 'Diterima';
                        } elseif ($tipe == 2) {
                            $model->lamaranStatus = 'Pending Review';
                        }
                        $model->save();
                    }
                    return $this->redirect(['/dashboard-perusahaan-lamaran', 'lowongan' => $lowonganid]);
            }
        } else {
            return $this->goHome();
        }
    }


                /**
     * Displays a single DashboardPerusahaanLamaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;
                $model = DashboardPerusahaanLamaran::find()->where(['lamaranID' => $id, 'lamaranLowonganID' => $lowonganid])->one();
                if (count($model) != null) {
                    return $this->render('../dashboard/DashboardPerusahaanLamaran/view', [
                        'model' => $this->findModel($id),
                        'lowongan' => $lowonganid,
                    ]);
                } else {
                    return $this->redirect(['/dashboard-perusahaan-pelamar']);
                }
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardPerusahaanLamaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;
                $model = new DashboardPerusahaanLamaran();

                if ($model->load(Yii::$app->request->post())) {
                    $model->lamaranLowonganID = $lowonganid;
                    $model->save();
                    return $this->redirect(['view', 'lowongan' => $lowonganid,'id' => $model->lamaranID]);
                }

                return $this->render('../dashboard/DashboardPerusahaanLamaran/create', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing DashboardPerusahaanLamaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'lowongan' => $lowonganid,'id' => $model->lamaranID]);
                }

                return $this->render('../dashboard/DashboardPerusahaanLamaran/update', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardPerusahaanLamaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-perusahaan-pelamar']);
            } else {
                $lowonganid = $lowongan;
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the DashboardPerusahaanLamaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardPerusahaanLamaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardPerusahaanLamaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
