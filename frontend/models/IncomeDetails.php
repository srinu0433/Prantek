<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "income_details".
 *
 * @property integer $id
 * @property integer $inst_id
 * @property integer $category
 * @property string $payer
 * @property integer $receiving_method
 * @property string $ref_num
 * @property string $amount
 * @property string $comments
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property string $modified_date
 */
class IncomeDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inst_id', 'category', 'payer', 'receiving_method', 'ref_num', 'amount', 'created_by', 'created_date'], 'required'],
            [['inst_id', 'category', 'receiving_method', 'status', 'created_by'], 'integer'],
            [['modified_date'], 'safe'],
            [['payer'], 'string', 'max' => 100],
            [['ref_num'], 'string', 'max' => 50],
            [['amount'], 'string', 'max' => 10],
            [['comments'], 'string', 'max' => 200],
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
            'category' => 'Category',
            'payer' => 'Payer',
            'receiving_method' => 'Receiving Method',
            'ref_num' => 'Ref Num',
            'amount' => 'Amount',
            'comments' => 'Comments',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
        ];
    }
}
