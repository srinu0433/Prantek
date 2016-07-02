<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student_batch".
 *
 * @property integer $id
 * @property integer $inst_id
 * @property integer $student_id
 * @property integer $batch_id
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property string $modified_date
 */
class StudentBatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_batch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inst_id', 'student_id', 'batch_id', 'created_by', 'created_date'], 'required'],
            [['inst_id', 'student_id', 'batch_id', 'status', 'created_by'], 'integer'],
            [['modified_date'], 'safe'],
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
            'student_id' => 'Student ID',
            'batch_id' => 'Batch ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
}
