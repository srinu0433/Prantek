<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dropdowns".
 *
 * @property integer $id
 * @property string $dropdown_name
 * @property integer $status
 */
class Dropdowns extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dropdowns';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dropdown_name'], 'required'],
            [['status'], 'integer'],
            [['dropdown_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dropdown_name' => 'Dropdown Name',
            'status' => 'Status',
        ];
    }
}
