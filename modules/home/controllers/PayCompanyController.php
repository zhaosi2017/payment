<?php

namespace app\modules\home\controllers;

use Yii;
use app\modules\home\models\PayCompany;
use app\modules\home\models\PayCompanySearch;
use app\controllers\GController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PayCompanyController implements the CRUD actions for PayCompany model.
 */
class PayCompanyController extends GController
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
     * Lists all PayCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PayCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PayCompany model.
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
     * Creates a new PayCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PayCompany();

        if ($model->load(Yii::$app->request->post())) {

            $model->file =  UploadedFile::getInstance($model, 'file');
            if($model->file){   //文件上传大小限制 10M
                $randName = uniqid() . rand(1000, 9999) . "." . $model->file->extension;
                $model->license = $randName;
                $model->file->saveAs(Yii::$app->params['uploadPath'] . $randName);
                $model->file = null;
            }

            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PayCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->file =  UploadedFile::getInstance($model, 'file');
            if($model->file){   //文件上传大小限制 10M
                $randName = uniqid() . rand(1000, 9999) . "." . $model->file->extension;
                $model->license = $randName;
                $model->file->saveAs(Yii::$app->params['uploadPath'] . $randName);
                $model->file = null;
            }
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PayCompany model.
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
     * Finds the PayCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PayCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PayCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
