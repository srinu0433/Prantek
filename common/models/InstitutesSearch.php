<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Institutes;

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
class InstitutesSearch extends Institutes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_users', 'sms_credits', 'logo_display', 'created_by', 'status'], 'integer'],
            [['company_name','business_type','start_date', 'end_date', 'created_date', 'modified_date','email','sender_id','sms_credits','sub_users'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
    	// bypass scenarios() implementation in the parent class
    	return Model::scenarios();
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
    	$query = self::find();
    
    	// add conditions that should always apply here
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	// grid filtering conditions
    	$query->andFilterWhere([
    			'id' => $this->id,
    			'business_type' => $this->business_type,
    			'status' => $this->status,
    			'sub_users' => $this->sub_users,
    			'created_date' => $this->created_date,
    			'modified_date' => $this->modified_date,
    	]);
    
    	$query->andFilterWhere(['like', 'company_name', $this->company_name])
    		->andFilterWhere(['like', 'email', $this->email])
    		->andFilterWhere(['like', 'sender_id', $this->sender_id]);
    
    	return $dataProvider;
    }
}
