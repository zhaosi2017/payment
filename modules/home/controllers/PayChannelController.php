<?php

namespace app\modules\home\controllers;

use Yii;
use app\modules\home\models\PayChannel;
use app\modules\home\models\PayChannelSearch;
use app\controllers\GController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayChannelController implements the CRUD actions for PayChannel model.
 */
class PayChannelController extends GController
{
    /**
     * @inheritdoc
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
     * Lists all PayChannel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PayChannelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PayChannel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PayChannel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PayChannel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'company_id' => $model->pay_company_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PayChannel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'company_id' => $model->pay_company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PayChannel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @param $status
     * @return \yii\web\Response
     */
    public function actionSwitch($id, $status)
    {
        $model = $this->findModel($id);
        $model->status = $status;
        if($model->save()){
            Yii::$app->getSession()->setFlash('success', '操作成功');
        }else{
            Yii::$app->getSession()->setFlash('error', '操作失败');
        }
        return $this->redirect(['index', 'company_id'=>$model->pay_company_id]);
    }

    /**
     * Finds the PayChannel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PayChannel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PayChannel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
