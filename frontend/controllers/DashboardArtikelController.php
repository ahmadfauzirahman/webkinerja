<?php

namespace frontend\controllers;

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
class DashboardArtikelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-artikel'] = true;
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
     * Lists all WebArtikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            $searchModel = new WebArtikelSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../dashboard/DashboardArtikel/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays a single WebArtikel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest) {
            if($this->findModel($id)['artikelUserID'] == Yii::$app->user->identity->userID){

                return $this->render('../dashboard/DashboardArtikel/view', [
                    'model' => $this->findModel($id),
                ]);

            } else {
                return $this->redirect(['index']);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Creates a new WebArtikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest) {
            $model = new WebArtikel();

            $data = Yii::$app->request->post();
            $model->artikelStatus = 'Draf';
            $model->artikelTglPost = date('Y-m-d h:i:s');
            $model->artikelUserID = Yii::$app->user->identity->userID;
            $model->artikelThumbnails = UploadedFile::getInstance($model, 'artikelThumbnails');
            if ($model->artikelThumbnails != NULL) $data['WebArtikel']['artikelThumbnails'] = $model->artikelThumbnails;

            if ($model->load($data) && $model->save()) {
                $model->artikelThumbnails->saveAs("./../../backend/web/thumbnails/" . $model->artikelThumbnails->name);
                return $this->redirect([
                    'view', 'id' => $model->artikelID,
                ]);
            }
            return $this->render('../dashboard/DashboardArtikel/create', ['model' => $model,]);

        } else {
            return $this->goHome();
        }
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
        if(!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);
            if($model->artikelUserID != Yii::$app->user->identity->userID){

                return $this->redirect(['index']);

            }
            if($this->findModel($id)['artikelStatus'] != 'Draf') {
                return $this->redirect(['index']);
            }
            $data = Yii::$app->request->post();

            $model->artikelThumbnails = UploadedFile::getInstance($model, 'artikelThumbnails');
            if ($model->artikelThumbnails != null) {
                $data['WebArtikel']['artikelThumbnails'] = $model->artikelThumbnails;
            }

            if ($model->load($data)) {
                if ($data['WebArtikel']['artikelThumbnails'] != "") {
                    $model->save();
                    $model->artikelThumbnails->saveAs("./../../backend/web/thumbnails/" .
                        $model->artikelThumbnails->name);
                } else {
                    $model['artikelThumbnails'] = WebArtikel::findOne($id)['artikelThumbnails'];
                    $model->save();
                }

                return $this->redirect([
                    'view',
                    'id' => $model->artikelID,
                ]);
            }
            $model = $this->findModel($id);
            return $this->render('../dashboard/DashboardArtikel/update', [
                'model' => $model,
            ]);
        } else {
            return $this->goHome();
        }
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
        if(!Yii::$app->user->isGuest) {
            if($this->findModel($id)['artikelUserID'] == Yii::$app->user->identity->userID){

                if($this->findModel($id)['artikelStatus'] == 'Draf') {
                    $this->findModel($id)->delete();
                    return $this->redirect(['index']);
                } else {
                    return $this->redirect(['index']);
                }

            } else {
                return $this->redirect(['index']);
            }
        } else {
            return $this->goHome();
        }
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
        if(!Yii::$app->user->isGuest) {
            if (($model = WebArtikel::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            return $this->goHome();
        }
    }
}
