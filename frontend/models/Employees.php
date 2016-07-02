<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $emp_id
 * @property string $f_name
 * @property integer $institute_id
 * @property string $l_name
 * @property integer $gender
 * @property string $dob
 * @property string $hire_date
 * @property string $end_date
 * @property integer $emp_type
 * @property integer $designation
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $aadhar
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property string $annual_salary
 * @property string $monthly_salary
 * @property string $photo
 * @property string $id_proof
 * @property string $address_proof
 * @property integer $status
 * @property string $bank_name
 * @property string $account_name
 * @property string $account_number
 * @property string $branch
 * @property string $ifsc_code
 * @property string $created_date
 * @property string $modified_date
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'f_name', 'institute_id', 'gender', 'dob', 'end_date', 'emp_type', 'designation', 'mobile', 'email'], 'required'],
            [['institute_id', 'gender', 'emp_type', 'designation','status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['emp_id', 'dob', 'hire_date', 'end_date', 'phone', 'aadhar', 'ifsc_code'], 'string', 'max' => 15],
            [['f_name', 'l_name', 'bank_name', 'branch'], 'string', 'max' => 50],
            [['mobile', 'pincode', 'annual_salary', 'monthly_salary'], 'string', 'max' => 10],
            [['email', 'photo', 'id_proof', 'address_proof'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 200],
            [['city', 'state', 'country'], 'string', 'max' => 30],
            [['account_name'], 'string', 'max' => 20],
            [['account_number'], 'string', 'max' => 25],
        	[['photo','id_proof','address_proof'], 'file',
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
            'emp_id' => 'Emp ID',
            'f_name' => 'First Name',
            'institute_id' => 'Institute ID',
            'l_name' => 'Last Name',
            'gender' => 'Gender',
            'dob' => 'Date of Birth',
            'hire_date' => 'Hire Date',
            'end_date' => 'End Date',
            'emp_type' => 'Emp Type',
            'designation' => 'Designation',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'aadhar' => 'Aadhar No',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
            'annual_salary' => 'Annual Salary',
            'monthly_salary' => 'Monthly Salary',
            'photo' => 'Photo',
            'id_proof' => 'Id Proof',
            'address_proof' => 'Address Proof',
        	'status' => 'Status',
            'bank_name' => 'Bank Name',
            'account_name' => 'Account Name',
            'account_number' => 'Account Number',
            'branch' => 'Branch',
            'ifsc_code' => 'Ifsc Code',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
}
