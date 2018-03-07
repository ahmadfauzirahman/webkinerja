<?php

namespace backend\controllers;

use Yii;
use common\models\WebEvents;
use common\models\WebEventsSearch;
use yii\web\Controller;
use common\auth\Auth;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\WebJadwalEvents;
use common\models\WebJadwalEventsSearch;

/**
 * WebEventsController implements the CRUD actions for WebEvents model.
 */
class WebEventsController extends Controller
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
     * Lists all WebEvents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebEventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebEvents model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = Auth::getRole();
        $jadwal = WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$id])->orderBy(['jadwalEventsTglMulai'=>SORT_ASC])->all();
        $jadwal_count = WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$id])->count();
        $tiket_count = \common\models\WebTiketEvents::find()->where(['tiketEventsEventsID'=>$id])->count();
        $jadwal_presentasi_count = \common\models\WebPresentasi::find()->where(['presentasiEventsID'=> $id])->count();
        $stands_count = \common\models\WebStands::find()->where(['standsEventsID'=>$id])->count();
        $booking_count = \common\models\WebBooking::find()->where(['bookingEventsID'=>$id])->count();
        $foto_count = \common\models\WebDokumentasi::find()->where(['dokumentasiEventsID'=> $id])->count();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'jadwal' => $jadwal,
            'jadwal_count' => $jadwal_count,
            'tiket_count' => $tiket_count,
            'jadwal_presentasi_count'=> $jadwal_presentasi_count,
            'stands_count' => $stands_count,
            'booking_count' => $booking_count,
            'foto_count' => $foto_count
        ]);
    }

    /**
     * Creates a new WebEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new WebEvents();

        $data = Yii::$app->request->post();
        $model->eventsThumbnails = UploadedFile::getInstance($model, 'eventsThumbnails');

        if ($model->eventsThumbnails != NULL)
            $data['WebEvents']['eventsThumbnails']
            = $model->eventsThumbnails;
        if ($model->load($data) && $model->save()) {
            $model->eventsThumbnails->saveAs(Yii::$app->basePath . "/web/foto_events/" . $model->eventsThumbnails->name);

            return $this->redirect([
                'view', 'id' => $model->eventsID,
            ]);
        }
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing WebEvents model.
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
        $model->eventsThumbnails = UploadedFile::getInstance($model, 'eventsThumbnails');
        if ($model->eventsThumbnails!= null) {
            $data['WebEvents']['eventsThumbnails'] = $model->eventsThumbnails;
        }

        if ($model->load($data)) {
            if ($data['WebEvents']['eventsThumbnails'] != "") {
                $model->save();
                $model->eventsThumbnails->saveAs(Yii::$app->basePath . "/web/foto_events/" .
                    $model->eventsThumbnails->name);
            }else{
                $model['eventsThumbnails'] = WebEvents::findOne($id)['eventsThumbnails'];
                $model->save();
            }

            return $this->redirect([
                'view',
                'id' => $model->eventsID,
            ]);
        }
        $model = $this->findModel($id);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebEvents model.
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
     * Finds the WebEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebEvents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
