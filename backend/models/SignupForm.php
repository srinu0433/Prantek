<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $business_type;
    public $sub_users;
    public $company_name;
    public $phone;
    public $start_date;
    public $end_date;
    public $sms_credits;
    public $sender_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //['username', 'filter', 'filter' => 'trim'],
            [['username','business_type','sub_users','phone','start_date','end_date','sms_credits','sender_id','password','password_repeat'], 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been taken.'],
            //['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
        	['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            ['password', 'string', 'min' => 6],
        	[['sub_users', 'sms_credits'], 'integer'],
        	[['start_date', 'end_date'], 'safe'],
        	[['business_type'], 'string', 'max' => 50],
        	[['company_name'], 'string', 'max' => 100],
        	[['phone', 'sender_id'], 'string', 'max' => 15],
        ];
    }
    
    public function attributeLabels(){
    	return [
		    'username'=>'Email',
		    'email'=>'Email',
		    'password'=>'Password',
		    'password_repeat'=>'Repeat Password',
		    'business_type'=>'Business Type',
		    'sub_users'=>'Sub Users',
		    'company_name'=>'Company Name',
		    'phone'=>'Phone',
		    'start_date'=>'Start Date',
		    'end_date'=>'End Date',
		    'sms_credits'=>'SMS Credits',
		    'sender_id'=>'Sender Id',
    	];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
