<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Employees;
use frontend\models\EmployeesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Utils;
/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
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
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
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
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employees();
		$model->institute_id = \Yii::$app->user->identity->institute_id;
		$model->created_date = Utils::getCurrentDateTime();
		$model->modified_date = Utils::getCurrentDateTime();
		$model->status = 1;
        if ($model->load(Yii::$app->request->post())) {
        	$photo_file = UploadedFile::getInstance($model, 'photo');
        	if(isset($photo_file)){
        		$name = str_replace(" ", "_", $photo_file->name);
        		$filename = 'emppics/'.time().'_'.$name;
        		$path = \Yii::$app->basePath.'/web/'.$filename;
        		$uploaded = $photo_file->saveAs($path);
        		$model->photo = $filename;
        	}
        	
        	$id_file = UploadedFile::getInstance($model, 'id_proof');
        	if(isset($id_file)){
        		$name1 = str_replace(" ", "_", $id_file->name);
        		$filename1 = 'emppics/'.time().'_'.$name1;
        		$path1 = \Yii::$app->basePath.'/web/'.$filename1;
        		$uploaded = $id_file->saveAs($path1);
        		$model->id_proof = $filename1;
        	}
        	
        	$addr_file = UploadedFile::getInstance($model, 'address_proof');
        	if(isset($addr_file)){
        		$name2 = str_replace(" ", "_", $addr_file->name);
        		$filename2 = 'emppics/'.time().'_'.$name2;
        		$path2 = \Yii::$app->basePath.'/web/'.$filename2;
        		$uploaded = $addr_file->saveAs($path2);
        		$model->address_proof = $filename2;
        	}
        	
        	if ($model->save()){
            	return $this->redirect(['view', 'id' => $model->id]);
        	} else {
        		throw new NotFoundHttpException('Something went wrong! Please try again!.');
        	}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
$filename = $model->photo;
$filename1 = $model->id_proof;
$filename2 = $model->address_proof;
$model->modified_date = Utils::getCurrentDateTime();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$photo_file = UploadedFile::getInstance($model, 'photo');
        	if(isset($photo_file)){
        		$name = str_replace(" ", "_", $photo_file->name);
        		$filename = 'emppics/'.time().'_'.$name;
        		$path = \Yii::$app->basePath.'/web/'.$filename;
        		$uploaded = $photo_file->saveAs($path);
        	}
        	$model->photo = $filename;
        	 
        	$id_file = UploadedFile::getInstance($model, 'id_proof');
        	if(isset($id_file)){
        		$name1 = str_replace(" ", "_", $id_file->name);
        		$filename1 = 'emppics/'.time().'_'.$name1;
        		$path1 = \Yii::$app->basePath.'/web/'.$filename1;
        		$uploaded = $id_file->saveAs($path1);
        	}
        	$model->id_proof = $filename1;
        	 
        	$addr_file = UploadedFile::getInstance($model, 'address_proof');
        	if(isset($addr_file)){
        		$name2 = str_replace(" ", "_", $addr_file->name);
        		$filename2 = 'emppics/'.time().'_'.$name2;
        		$path2 = \Yii::$app->basePath.'/web/'.$filename2;
        		$uploaded = $addr_file->saveAs($path2);
        	}
        	$model->address_proof = $filename2;
        	
        	if ($model->save()){
            	return $this->redirect(['view', 'id' => $model->id]);
        	} else {
        		throw new NotFoundHttpException('Something went wrong! Please try again!.');
        	}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employees model.
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
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
