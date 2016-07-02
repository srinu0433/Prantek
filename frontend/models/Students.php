<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property integer $inst_id
 * @property string $f_name
 * @property string $l_name
 * @property integer $gender
 * @property string $number
 * @property string $mobile
 * @property string $alternate_mobile
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property integer $communication
 * @property string $photo
 * @property string $id_proof
 * @property string $others
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property string $modified_date
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inst_id', 'f_name', 'gender', 'number', 'mobile', 'email', 'address', 'city', 'state', 'country', 'pincode', 'communication', 'created_by', 'created_date'], 'required'],
            [['inst_id', 'gender', 'communication', 'status', 'created_by'], 'integer'],
            [['modified_date'], 'safe'],
            [['f_name', 'l_name', 'city', 'state', 'country'], 'string', 'max' => 50],
            [['number', 'mobile', 'alternate_mobile'], 'string', 'max' => 10],
            [['email', 'photo', 'id_proof'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 200],
            [['pincode'], 'string', 'max' => 6],
            [['others'], 'string', 'max' => 250],
            [['created_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inst_id' => 'Inst ID',
            'f_name' => 'F Name',
            'l_name' => 'L Name',
            'gender' => 'Gender',
            'number' => 'Number',
            'mobile' => 'Mobile',
            'alternate_mobile' => 'Alternate Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
            'communication' => 'Communication',
            'photo' => 'Photo',
            'id_proof' => 'Id Proof',
            'others' => 'Others',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
}
