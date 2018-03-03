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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'event' => $event
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

            if ($model->DokumentasiFoto){
                foreach ($model->DokumentasiFoto as $item) {
                    $data['WebDokumentasi']['DokumentasiFoto'] = $item;
                    if ($model->load($data)){
                        $model->save(false);
                        $item->saveAs(Yii::$app->basePath . "/web/foto_events/" . $item->name);
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
