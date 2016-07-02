<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "institutes".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property string $business_type
 * @property integer $sub_users
 * @property string $company_name
 * @property string $phone
 * @property string $email
 * @property string $start_date
 * @property string $end_date
 * @property integer $sms_credits
 * @property string $sender_id
 * @property string $logo
 * @property integer $logo_display
 * @property string $address
 * @property string $mobile
 * @property string $mobile2
 * @property string $phone2
 * @property string $email2
 * @property string $website
 * @property integer $created_by
 * @property integer $status
 * @property string $created_date
 * @property string $modified_date
 */
class Institutes extends \yii\db\ActiveRecord
{
	//public $logo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institutes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'business_type', 'company_name', 'phone', 'created_by'], 'required'],
        	//[['logo'], 'required',['on'=>'profile']],
            [['admin_id', 'sub_users', 'sms_credits', 'logo_display', 'created_by', 'status'], 'integer'],
            [['start_date', 'end_date', 'created_date', 'modified_date'], 'safe'],
            [['business_type'], 'string', 'max' => 50],
            [['company_name'], 'string', 'max' => 100],
            [['phone', 'sender_id', 'phone2'], 'string', 'max' => 15],
            [['email', 'logo', 'address', 'email2', 'website'], 'string', 'max' => 255],
            [['mobile', 'mobile2'], 'string', 'max' => 11],
        	[['logo'], 'file',
        		'skipOnEmpty' => true,
        		//'extensions' => 'jpg,jpeg,png,pdf,xls,xlsx,doc,docx,txt',
        		'extensions' => 'jpg,jpeg,png',
        		'maxFiles' => 1,
        		/*'mimeTypes'=>['application/pdf',
        		 'application/msword',
        				'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        				'image/jpeg',
        				'image/png',
        				'application/vnd.ms-excel',
        				'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        				'text/plain',
        		],*/
        		'mimeTypes'=>['image/jpeg',
        				'image/png',
        		],
        	],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'business_type' => 'Business Type',
            'sub_users' => 'Sub Users',
            'company_name' => 'Company Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'sms_credits' => 'SMS Credits',
            'sender_id' => 'Sender ID',
            'logo' => 'Logo',
            'logo_display' => 'Logo Display',
            'address' => 'Address',
            'mobile' => 'Mobile',
            'mobile2' => 'Mobile2',
            'phone2' => 'Phone2',
            'email2' => 'Email2',
            'website' => 'Website',
            'created_by' => 'Created By',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
}
