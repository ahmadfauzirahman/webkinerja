<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebBooking;
use common\models\WebBookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WebBookingController implements the CRUD actions for WebBooking model.
 */
class WebBookingController extends Controller
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
     * Lists all WebBooking models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebBookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
        $event = \common\models\WebEvents::findOne($id);

        $jadwal_count = \common\models\WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$id])->count();
        $tiket_count = \common\models\WebTiketEvents::find()->where(['tiketEventsEventsID'=>$id])->count();
        $jadwal_presentasi_count = \common\models\WebPresentasi::find()->where(['presentasiEventsID'=> $id])->count();
        $stands_count = \common\models\WebStands::find()->where(['standsEventsID'=>$id])->count();
        $booking_count = \common\models\WebBooking::find()->where(['bookingEventsID'=>$id])->count();
        $foto_count = \common\models\WebDokumentasi::find()->where(['dokumentasiEventsID'=> $id])->count();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'event' => $event,
            'jadwal_count' => $jadwal_count,
            'tiket_count' => $tiket_count,
            'jadwal_presentasi_count'=> $jadwal_presentasi_count,
            'stands_count' => $stands_count,
            'booking_count' => $booking_count,
            'foto_count' => $foto_count
        ]);
    }

    /**
     * Displays a single WebBooking model.
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
     * Creates a new WebBooking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new WebBooking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bookingID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WebBooking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);
        $data = Yii::$app->request->post();
        $model->bookingBuktiPembayaran = UploadedFile::getInstance($model, 'bookingBuktiPembayaran');

        if ($model->bookingBuktiPembayaran != null) {
            $data['WebBooking']['bookingBuktiPembayaran'] = $model->bookingBuktiPembayaran;
        }
//        echo "<pre>";
//        print_r($model->load($data));
//        exit();
        if ($model->load($data)) {

            if ($data['WebBooking']['bookingBuktiPembayaran'] != "") {
//                echo "<pre>";
//                print_r($model);
//                exit();


//                var_dump($model);
//                exit();
                $model->save();
                $model->bookingBuktiPembayaran->saveAs(Yii::$app->basePath . "/web/booking/" .
                    $model->bookingBuktiPembayaran->name);




                if ($model->bookingStatus == "Konfirmasi") {
                    $stand = \common\models\WebStands::find()->where(['standsEventsID' => $model->bookingEventsID, 'standsID' => $model->bookingStandsID])->one();
                    $perusahaan = \common\models\WebPerusahaan::find()->where(['perusahaanEmail' => $model->bookingPerusahaanEmail])->one();
                    $stand->standsPerusahaanID = $perusahaan->perusahaanID;
                    $stand->standsStatus = "Terisi";
                    if ($stand->save()) {
//                        $event = \common\models\WebEvents::findOne($model->bookingEventsID);
                        return $this->redirect(['index', 'id' => $model->bookingEventsID]);
                    }
                }
            } else {
                $model['bookingBuktiPembayaran'] = WebBooking::findOne($id)['bookingBuktiPembayaran'];
                $model->save();
            }


            return $this->redirect([
                'view',
                'id' => $model->eventsID,
            ]);
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            if($model->bookingStatus == "Konfirmasi"){
//                $stand = \common\models\WebStands::find()->where(['standsEventsID'=>$model->bookingEventsID,'standsID'=>$model->bookingStandsID])->one();
//                $perusahaan = \common\models\WebPerusahaan::find()->where(['perusahaanEmail'=>$model->bookingPerusahaanEmail])->one();
//                $stand->standsPerusahaanID = $perusahaan->perusahaanID;
//                $stand->standsStatus = "Terisi";
//                if ($stand->save()){
//                    return $this->redirect(['index', 'id' => $model->bookingID]);
//                }
//            }
//            return $this->redirect(['index', 'id' => $model->bookingID]);
//        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebBooking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $model = WebBooking::findOne($id);
        $model->delete();

        return $this->redirect(['index', 'id'=>$model->bookingEventsID]);
    }

    /**
     * Finds the WebBooking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebBooking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebBooking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
