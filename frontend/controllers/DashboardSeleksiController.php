<?php

namespace frontend\controllers;

use frontend\models\Dashboard\DashboardLowongan;
use frontend\models\Dashboard\DashboardPerusahaan;
use Yii;
use frontend\models\Dashboard\DashboardSeleksi;
use frontend\models\Dashboard\DashboardSeleksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardSeleksiController implements the CRUD actions for DashboardSeleksi model.
 */
class DashboardSeleksiController extends Controller
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
     * Lists all DashboardSeleksi models.
     * @return mixed
     */
    public function actionIndex($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-lowongan']);
            } else {
                $lowonganid = $lowongan;

                $cekLowongan = DashboardLowongan::findOne($lowonganid);
                if (count($cekLowongan) != null) {
                    $cekPemilikPerusahaan = DashboardPerusahaan::findOne($cekLowongan['lowonganPerusahaanID']);
                    if (count($cekPemilikPerusahaan) != null) {
                        $searchModel = new DashboardSeleksiSearch(['seleksiLowonganID' => $lowonganid]);
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        return $this->render('../dashboard/DashboardSeleksi/index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'lowongan' => $lowonganid,
                        ]);
                    } else {
                        return $this->redirect(['/dashboard-lowongan']);
                    }
                } else {
                    return $this->redirect(['/dashboard-lowongan']);
                }
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardSeleksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-lowongan']);
            } else {
                $lowonganid = $lowongan;
                $model = DashboardSeleksi::find()->where(['seleksiID' => $id, 'seleksiLowonganID' => $lowonganid])->one();
                if (count($model) != null) {
                    return $this->render('../dashboard/DashboardSeleksi/view', [
                        'model' => $this->findModel($id),
                        'lowongan' => $lowonganid,
                    ]);
                } else {
                    return $this->redirect(['/dashboard-lowongan']);
                }
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardSeleksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            $model = new DashboardSeleksi();

            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-lowongan']);
            } else {
                $lowonganid = $lowongan;

                if ($model->load(Yii::$app->request->post())) {
                    if ($model->seleksiLokasi == 0) {
                        $model->seleksiStatus = "Konfirmasi Admin";
                    }
                    $model->seleksiLowonganID = $lowonganid;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->seleksiID, 'lowongan' => $lowonganid]);
                }

                return $this->render('../dashboard/DashboardSeleksi/create', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing DashboardSeleksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-lowongan']);
            } else {
                $lowonganid = $lowongan;

                $model = $this->findModel($id);

                $lokasiCurrent = $model->seleksiLokasi;
                $statusCurrent = $model->seleksiStatus;
                if ($model->load(Yii::$app->request->post())) {
                    if ($lokasiCurrent == 0) {
                        if ($model->seleksiLokasi == 0) {
                            $model->seleksiStatus = $statusCurrent;
                        }
                    } else {
                        if ($model->seleksiLokasi == 0) {
                            $model->seleksiStatus = "Konfirmasi Admin";
                        }
                    }
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->seleksiID, 'lowongan' => $lowonganid]);
                }

                return $this->render('../dashboard/DashboardSeleksi/update', [
                    'model' => $model,
                    'lowongan' => $lowonganid,
                ]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardSeleksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$lowongan = null)
    {
        if(!Yii::$app->user->isGuest) {
            if (!isset($lowongan) || $lowongan == '') {
                return $this->redirect(['/dashboard-lowongan']);
            } else {
                $lowonganid = $lowongan;
                $model = DashboardSeleksi::find()->where(['seleksiID' => $id, 'seleksiLowonganID' => $lowonganid])->one();
                if (count($model) != null) {
                    $this->findModel($id)->delete();
                }
            }
            return $this->redirect(['index', 'lowongan' => $lowonganid]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the DashboardSeleksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardSeleksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardSeleksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
