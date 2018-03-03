<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebJadwalEvents;
use common\models\WebJadwalEventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebJadwalEventsController implements the CRUD actions for WebJadwalEvents model.
 */
class WebJadwalEventsController extends Controller
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
     * Lists all WebJadwalEvents models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = Auth::getRole();
        $event = \common\models\WebEvents::findOne($id);
        $searchModel = new WebJadwalEventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'event' => $event
        ]);
    }

    /**
     * Displays a single WebJadwalEvents model.
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
     * Creates a new WebJadwalEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = Auth::getRole();
        $model = new WebJadwalEvents();
        $event = \common\models\WebEvents::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'berhasil menambahkan '.$model->jadwalEventsNama);
            return $this->redirect(['index', 'id' => $model->jadwalEventsEventsID]);
        }
        return $this->render('create', [
            'model' => $model,
            'event' => $event
        ]);
    }

    /**
     * Updates an existing WebJadwalEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id2)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);
        $event = \common\models\WebEvents::findOne($id2);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jadwalEventsID]);
        }

        return $this->render('update', [
            'model' => $model,
            'event' => $event
        ]);
    }

    /**
     * Deletes an existing WebJadwalEvents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $model = WebJadwalEvents::findOne($id);
        $model->delete();

        return $this->redirect(['index','id'=>$model->jadwalEventsEventsID]);
    }

    /**
     * Finds the WebJadwalEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebJadwalEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebJadwalEvents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
