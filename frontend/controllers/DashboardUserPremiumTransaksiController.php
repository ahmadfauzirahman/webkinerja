<?php

namespace frontend\controllers;

use frontend\models\Dashboard\DashboardUserPremium;
use Yii;
use frontend\models\Dashboard\DashboardUserPremiumTransaksi;
use frontend\models\Dashboard\DashboardUserPremiumTransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DashboardUserPremiumTransaksiController implements the CRUD actions for DashboardUserPremiumTransaksi model.
 */
class DashboardUserPremiumTransaksiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['transaksi'] = true;
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
     * Lists all DashboardUserPremiumTransaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            $searchModel = new DashboardUserPremiumTransaksiSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../dashboard/dashboardtransaksi/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardUserPremiumTransaksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest) {
            return $this->render('../dashboard/dashboardtransaksi/view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardUserPremiumTransaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest) {
            $model = new DashboardUserPremiumTransaksi();
            $image = UploadedFile::getInstance($model, 'userPremiumTransaksiBukti');

            if ($model->load(Yii::$app->request->post())) {

                $id = strtotime(date('Ymdhis'));
                $image->saveAs(Yii::$app->basePath . "./../backend/web/buktitransfer/" . $id . '.' . $image->extension);
                $model->userPremiumTransaksiBukti = $id . '.' . $image->extension;
                $model->userPremiumID = DashboardUserPremium::find()->where(['userID' => Yii::$app->user->identity->userID])->one()['userPremiumID'];
                $model->userID = Yii::$app->user->identity->userID;
                $model->userPremiumTransaksiTglTransaksi = date('Y-m-d', strtotime($model->userPremiumTransaksiTglTransaksi));
                $model->userPremiumTransaksiTglKonfirmasi = date('Y-m-d h:i:s');
                $model->save();

                Yii::$app->db->createCommand()->update('web_user_premium',['userPremiumStatus' => 'Konfirmasi Admin'], 'userID = :idUser', [':idUser' => Yii::$app->user->identity->userID])->execute();

                return $this->redirect(['index']);
            }

            return $this->render('../dashboard/dashboardtransaksi/create', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing DashboardUserPremiumTransaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);

            if ($model->userPremiumTransaksiStatus != 'Konfirmasi Admin') {
                return $this->redirect(['index']);
            }
            $current_image = $model->userPremiumTransaksiBukti;
            if ($model->load(Yii::$app->request->post())) {
                $id = strtotime(date('Ymdhis'));
                $image = UploadedFile::getInstance($model, 'userPremiumTransaksiBukti');
                if(!empty($image) && $image->size !== 0){
                    $image->saveAs(Yii::$app->basePath . "./../backend/web/buktitransfer/" . $id.'.'.$image->extension);
                    $model->userPremiumTransaksiBukti = $id.'.'.$image->extension;
                } else {
                    $model->userPremiumTransaksiBukti = $current_image;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->userPremiumTransaksiID]);
            }
            return $this->render('../dashboard/dashboardtransaksi/update', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardUserPremiumTransaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the DashboardUserPremiumTransaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardUserPremiumTransaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardUserPremiumTransaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
