<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lookup_data".
 *
 * @property integer $id
 * @property integer $institute_id
 * @property integer $drop_down
 * @property string $dd_value
 * @property integer $created_by
 * @property integer $status
 * @property string $created_date
 * @property string $modified_date
 */
class LookupData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institute_id', 'drop_down', 'dd_value', 'created_by'], 'required'],
            [['institute_id', 'drop_down', 'created_by', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['dd_value'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institute_id' => 'Institute',
            'drop_down' => 'Drop Down',
            'dd_value' => 'Value',
            'created_by' => 'Created By',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
    
    public static function getDropdownDetails($dropdown,$instid=""){
    	if($instid!=""){
    		$q1 = "institute_id=".$instid." and";
    	} else {
    		$q1 = "";
    	}
    	$sql = "select * from lookup_data where ".$q1." drop_down=".$dropdown." and status=1";
    	$data = self::findBySql($sql)->all();
    	return ArrayHelper::map($data, 'id', 'dd_value');
    }
}
