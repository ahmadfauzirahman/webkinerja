<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User\DashboardBerkasPelamar;
use frontend\models\User\DashboardBerkasPelamarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DashboardBerkasPelamarController implements the CRUD actions for DashboardBerkasPelamar model.
 */
class DashboardBerkasPelamarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-berkas-pelamar'] = true;
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
     * Lists all DashboardBerkasPelamar models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            $searchModel = new DashboardBerkasPelamarSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../dashboard/DashboardBerkasPelamar/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardBerkasPelamar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest) {
            return $this->render('../dashboard/DashboardBerkasPelamar/view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new DashboardBerkasPelamar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest) {
            $model = new DashboardBerkasPelamar();
            $image = UploadedFile::getInstance($model, 'berkasPelamarFile');

            $folder = Yii::$app->basePath. "./../frontend/web/berkaspelamar/".Yii::$app->user->identity->userID;
            if ($model->load(Yii::$app->request->post())) {
                if(!is_dir($folder)){
                    mkdir($folder);
                }
                $id = strtotime(date('Ymdhis'));
                $image->saveAs($folder . "/" . $id . '.' . $image->extension);
                $model->berkasPelamarFile = $id . '.' . $image->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->berkasPelamarID]);
            }

            return $this->render('../dashboard/DashboardBerkasPelamar/create', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Updates an existing DashboardBerkasPelamar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);

            $current_image = $model->berkasPelamarFile;
            $folder = Yii::$app->basePath. "./../frontend/web/berkaspelamar/".Yii::$app->user->identity->userID;
            if ($model->load(Yii::$app->request->post())) {
                if(!is_dir($folder)){
                    mkdir($folder);
                }
                $id = strtotime(date('Ymdhis'));
                $image = UploadedFile::getInstance($model, 'berkasPelamarFile');
                if(!empty($image) && $image->size !== 0){
                    $image->saveAs($folder . "/" . $id.'.'.$image->extension);
                    $model->berkasPelamarFile = $id.'.'.$image->extension;
                } else {
                    $model->berkasPelamarFile = $current_image;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->berkasPelamarID]);
            }

            return $this->render('../dashboard/DashboardBerkasPelamar/update', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardBerkasPelamar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Finds the DashboardBerkasPelamar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardBerkasPelamar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardBerkasPelamar::find()->where(['berkasPelamarID' => $id,'berkasPelamarUserID' => Yii::$app->user->identity->userID])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
