<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebArtikel\WebArtikel;
use common\models\WebArtikel\WebArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WebArtikelController implements the CRUD actions for WebArtikel model.
 */
class WebArtikelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all WebArtikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebArtikel model.
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
     * Creates a new WebArtikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new WebArtikel();

        $data = Yii::$app->request->post();
        $model->artikelThumbnails= UploadedFile::getInstance($model, 'artikelThumbnails');
        if ($model->artikelThumbnails != NULL) $data['WebArtikel']['artikelThumbnails'] = $model->artikelThumbnails;
//        $model->tanggal_pendaftaran = date('Y-m-d H:i:s');
        if ($model->load($data) && $model->save()) {
            $model->artikelThumbnails->saveAs(Yii::$app->basePath . "/web/thumbnails/" . $model->artikelThumbnails->name);
            return $this->redirect([
                'view', 'id' => $model->artikelID,
            ]);
        }
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing WebArtikel model.
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
        $model->artikelThumbnails = UploadedFile::getInstance($model, 'artikelThumbnails');
        if ($model->artikelThumbnails != null) {
            $data['WebArtikel']['artikelThumbnails'] = $model->artikelThumbnails;
        }

        if ($model->load($data) && $model->save()) {
            if ($data['WebArtikel']['artikelThumbnails'] != "") {
                $model->artikelThumbnails->saveAs(Yii::$app->basePath . "/web/thumbnails/" .
                    $model->artikelThumbnails->name);
            }

            return $this->redirect([
                'view',
                'id' => $model->artikelID,
            ]);
        }
        $model = $this->findModel($id);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebArtikel model.
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
     * Finds the WebArtikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebArtikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebArtikel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
