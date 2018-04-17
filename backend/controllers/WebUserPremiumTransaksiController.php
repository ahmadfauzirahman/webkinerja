<?php

namespace backend\controllers;

use common\auth\Auth;
use common\models\WebUserPremium;
use Yii;
use common\models\WebUserPremiumTransaksi;
use common\models\WebUserPremiumTransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebUserPremiumTransaksiController implements the CRUD actions for WebUserPremiumTransaksi model.
 */
class WebUserPremiumTransaksiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->layout = Auth::getRole();
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
     * Lists all WebUserPremiumTransaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WebUserPremiumTransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebUserPremiumTransaksi model.
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
     * Creates a new WebUserPremiumTransaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new WebUserPremiumTransaksi();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->userPremiumTransaksiID]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing WebUserPremiumTransaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->userPremiumTransaksiStatus == "Transaksi Diterima"){
                Yii::$app->db->createCommand()->update('web_user_premium',['userPremiumAkhir' => date("Y-m-d h:i:s",strtotime("+1 year",strtotime(date($model->userPremiumTransaksiTglKonfirmasi)))),'userPremiumStatus' => 'Aktif'], 'userPremiumID = :idPremiumUser', [':idPremiumUser' => $model->userPremiumID])->execute();
            }
            return $this->redirect(['view', 'id' => $model->userPremiumTransaksiID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebUserPremiumTransaksi model.
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
     * Finds the WebUserPremiumTransaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebUserPremiumTransaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebUserPremiumTransaksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
