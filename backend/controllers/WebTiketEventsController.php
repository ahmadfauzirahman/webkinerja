<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebTiketEvents;
use common\models\WebTiketEventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebTiketEventsController implements the CRUD actions for WebTiketEvents model.
 */
class WebTiketEventsController extends Controller
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
     * Lists all WebTiketEvents models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebTiketEventsSearch();
        $event = \common\models\WebEvents::findOne($id);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

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
     * Displays a single WebTiketEvents model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WebTiketEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WebTiketEvents();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tiketEventsID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WebTiketEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tiketEventsID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebTiketEvents model.
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
     * Finds the WebTiketEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebTiketEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebTiketEvents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
