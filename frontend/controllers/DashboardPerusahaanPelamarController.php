<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dashboard\DashboardLowongan;
use frontend\models\Dashboard\DashboardLowonganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DashboardLowonganController implements the CRUD actions for DashboardLowongan model.
 */
class DashboardPerusahaanPelamarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->view->params['user'] = true;
        $this->view->params['dashboard-pelamar'] = true;
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
     * Lists all DashboardLowongan models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest) {
            $searchModel = new DashboardLowonganSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../dashboard/DashboardPerusahaanPelamar/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->goHome();
        }
    }
}
