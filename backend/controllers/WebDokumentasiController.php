<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebDokumentasi;
use common\models\WebDokumentasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WebDokumentasiController implements the CRUD actions for WebDokumentasi model.
 */
class WebDokumentasiController extends Controller
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
     * Lists all WebDokumentasi models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebDokumentasiSearch();
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
     * Displays a single WebDokumentasi model.
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
     * Creates a new WebDokumentasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = Auth::getRole();
        $model = new WebDokumentasi();
        $event = \common\models\WebEvents::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $model->DokumentasiFoto = UploadedFile::getInstances($model, 'DokumentasiFoto');

            if ($model->DokumentasiFoto != NULL){
                foreach ($model->DokumentasiFoto as $item) {
                    $data['WebDokumentasi']['DokumentasiFoto'] = $item;
                    if ($model->load($data)){
//                        $model->save(false);
                        $model1 = new WebDokumentasi();
//                        $model->save();
                        $item->saveAs(Yii::$app->basePath . "/web/foto_events/" . $item->name);
                        $model1->dokumentasiEventsID = $id;
                        $model1->DokumentasiFoto = $item->name;
                        $model1->save(false);
                    }

                    }

            }

            return $this->redirect(['index', 'id' => $model->dokumentasiEventsID]);
        }

        return $this->render('create', [
            'model' => $model,
            'event' => $event
        ]);
    }

    /**
     * Updates an existing WebDokumentasi model.
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
            return $this->redirect(['view', 'id' => $model->dokumentasiID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebDokumentasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $dokumentasi = WebDokumentasi::findOne($id);
        $dokumentasi->delete();

        return $this->redirect(['index','id'=>$dokumentasi->dokumentasiEventsID]);
    }

    /**
     * Finds the WebDokumentasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebDokumentasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebDokumentasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
