<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "batch_details".
 *
 * @property integer $id
 * @property string $batch_no
 * @property integer $mode_of_training
 * @property integer $training_program
 * @property integer $session_time
 * @property integer $institute_id
 * @property string $trainer
 * @property string $amount
 * @property integer $created_by
 * @property integer $status
 * @property string $created_date
 * @property string $modified_date
 */
class BatchDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batch_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_no', 'mode_of_training', 'training_program', 'session_time', 'trainer', 'amount', 'created_by', 'institute_id', 'status'], 'required'],
            [['mode_of_training', 'training_program', 'session_time', 'created_by'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['batch_no'], 'string', 'max' => 10],
            [['trainer'], 'string', 'max' => 50],
            [['amount'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'batch_no' => 'Batch No',
            'mode_of_training' => 'Mode Of Training',
            'training_program' => 'Training Program',
            'session_time' => 'Session',
            'trainer' => 'Trainer',
        	'institute_id' => 'Institute',
            'amount' => 'Amount',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        	'status' => 'Status'
        ];
    }
}
