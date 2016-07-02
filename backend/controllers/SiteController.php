<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AdminLoginForm;
use common\models\Institutes;
use common\models\InstitutesSearch;
use common\models\User;
use common\models\AdminUser;
use backend\models\SignupForm;
use yii\base\UserException;
use yii\web\NotFoundHttpException;
use common\models\Utils;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','institutes','create','view','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    /*public function actionSignup()
    {
    	$model = new SignupForm();
    	if ($model->load(Yii::$app->request->post())) {
    		if ($user = $model->signup()) {
    			if (Yii::$app->getUser()->login($user)) {
    				return $this->goHome();
    			}
    		}
    	}
    
    	return $this->render('signup', [
    			'model' => $model,
    	]);
    }*/
    
    /**
     * Lists all Institutes.
     * @return mixed
     */
    public function actionInstitutes()
    {
    	$searchModel = new InstitutesSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('institutes', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    public function actionCreate()
    {
    	$model = new SignupForm();
    	try{
	    	if ($model->load(Yii::$app->request->post())) {
	    		$model->username = $model->email;
	    		$conn = \Yii::$app->db;
	    		$transaction = $conn->beginTransaction();
	    		if ($user = $model->create()) {
	    			$institute = new Institutes();
	    			$institute->business_type = $model->business_type;
	    			$institute->admin_id = $user->id;
	    			$institute->sub_users = $model->sub_users;
	    			$institute->company_name = $model->company_name;
	    			$institute->phone = $model->phone;
	    			$institute->email = $model->email;
	    			$institute->start_date = $model->start_date;
	    			$institute->end_date = $model->end_date;
	    			$institute->sms_credits = $model->sms_credits;
	    			$institute->sender_id = $model->sender_id;
	    			$institute->created_by = \Yii::$app->user->id;
	    			$institute->created_date = Utils::getCurrentDateTime();
	    			$institute->modified_date = Utils::getCurrentDateTime();
	    			$institute->save();
	    			$sql = "SELECT MAX(id) as id FROM institutes";
	    			$inst = $institute->findBySql($sql)->one();
	    			$sql1 = "UPDATE user SET institute_id=".$inst->id." WHERE id=".$user->id;
	    			$command = $conn->createCommand($sql1);
	    			$command->execute();
	    			$transaction->commit();
	    			return $this->redirect(['view', 'id' => $inst->id]);
	    		}
	    	}	
    	} catch (\Exception $ex){
    		$transaction->rollBack();
    		//throw $ex;
    		throw new UserException("Something Went Wrong! Please try again!");
    	}
    	return $this->render('signup', [
    			'model' => $model,
    	]);
    }
    
    public function actionView($id){
    	if (Institutes::findOne($id) !== null) {
    		$institute = Institutes::findOne($id);
    		$model = $this->findModel($institute->admin_id);
    		$model->institute = $institute;
    	} else {
    		throw new NotFoundHttpException('Institute does not exist.');
    	}
    	return $this->render('view', [
    			'model' => $model
    	]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Finds the LookupData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LookupData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
    	if (($model = User::findOne($id)) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
}
