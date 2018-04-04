<?php

namespace frontend\controllers;

use common\models\WebKota;
use Yii;
use frontend\models\Dashboard\DashboardPerusahaan;
use frontend\models\Dashboard\DashboardPerusahaanSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DashboardPerusahaanController implements the CRUD actions for DashboardPerusahaan model.
 */
class DashboardPerusahaanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['perusahaan'] = true;
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
     * Lists all DashboardPerusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new DashboardPerusahaanSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('../dashboard/DashboardPerusahaan/index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        if(!Yii::$app->user->isGuest) {
            return $this->actionUpdate(DashboardPerusahaan::find()->where(['perusahaanUserID' => Yii::$app->user->identity->userID])->one()['perusahaanID']);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single DashboardPerusahaan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($id)
//    {
//        return $this->render('../dashboard/DashboardPerusahaan/view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new DashboardPerusahaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new DashboardPerusahaan();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->perusahaanID]);
//        }
//
//        return $this->render('../dashboard/DashboardPerusahaan/create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing DashboardPerusahaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);

            $current_image = $model->perusahaanFoto;
            if ($model->load(Yii::$app->request->post())) {
                $id = strtotime(date('Ymdhis'));
                $image = UploadedFile::getInstance($model, 'perusahaanFoto');
                if(!empty($image) && $image->size !== 0){
                    $image->saveAs(Yii::$app->basePath . "./../backend/web/logoperusahaan/" . $id.'.'.$image->extension);
                    $model->perusahaanFoto = $id.'.'.$image->extension;
                } else {
                    $model->perusahaanFoto = $current_image;
                }
                $model->save();
                return $this->redirect(['index']);
            }

            return $this->render('../dashboard/DashboardPerusahaan/update', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Deletes an existing DashboardPerusahaan model.
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
     * Finds the DashboardPerusahaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DashboardPerusahaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DashboardPerusahaan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProvinsi($id)
    {
        $regencies = WebKota::find()->where(['kotaProvinsiID' => $id])->all();

        foreach ($regencies as $regency)
        {
            $tagOptions = ['prompt' => "Pilih Kota..."];
            return Html::renderSelectOptions([], ArrayHelper::map($regencies, 'kotaID', 'kotaNama'), $tagOptions);
        }

    }
}
