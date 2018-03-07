<?php

namespace backend\controllers;

use common\auth\Auth;
use Yii;
use common\models\WebStands;
use common\models\WebStandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebStandsController implements the CRUD actions for WebStands model.
 */
class WebStandsController extends Controller
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
     * Lists all WebStands models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = Auth::getRole();
        $searchModel = new WebStandsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
        $event = \common\models\WebEvents::findOne($id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'event' => $event
        ]);
    }

    /**
     * Displays a single WebStands model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $id2)
    {
        $this->layout = Auth::getRole();
        $event = \common\models\WebEvents::findOne($id2);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'event' => $event
        ]);
    }

    /**
     * Creates a new WebStands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = Auth::getRole();
        $model = new WebStands();
        $event = \common\models\WebEvents::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->standsID, 'id2'=>$event->eventsID]);
        }

        return $this->render('create', [
            'model' => $model,
            'event' => $event
        ]);
    }

    /**
     * Updates an existing WebStands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id2)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);
//        $event = \common\models\WebEvents::findOne($id2);
        $event = \common\models\WebEvents::findOne($id2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->standsID]);
        }

        return $this->render('update', [
            'model' => $model,
            'event'=> $event
        ]);
    }

    /**
     * Deletes an existing WebStands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $stand = \common\models\WebStands::findOne($id);
        $stand->delete();

        return $this->redirect(['index', 'id'=>$stand->standsEventsID]);
    }

    /**
     * Finds the WebStands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebStands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = Auth::getRole();
        if (($model = WebStands::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
