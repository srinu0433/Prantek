<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Employees;

/**
 * EmployeesSearch represents the model behind the search form about `frontend\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'institute_id', 'gender', 'emp_type', 'designation','status'], 'integer'],
            [['emp_id', 'f_name', 'l_name', 'dob', 'hire_date', 'end_date', 'phone', 'mobile', 'email', 'aadhar', 'address', 'city', 'state', 'country', 'pincode', 'annual_salary', 'monthly_salary', 'photo', 'id_proof', 'address_proof', 'bank_name', 'account_name', 'account_number', 'branch', 'ifsc_code', 'created_date', 'modified_date','status'], 'safe'],
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
        $query = Employees::find();

        // add conditions that should always apply here
		//$query->institute_id = \Yii::$app->user->identity->institute_id;
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
            'institute_id' =>  \Yii::$app->user->identity->institute_id,
            'gender' => $this->gender,
            'emp_type' => $this->emp_type,
            'designation' => $this->designation,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        	'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'emp_id', $this->emp_id])
            ->andFilterWhere(['like', 'f_name', $this->f_name])
            ->andFilterWhere(['like', 'l_name', $this->l_name])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'hire_date', $this->hire_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'aadhar', $this->aadhar])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'pincode', $this->pincode])
            ->andFilterWhere(['like', 'annual_salary', $this->annual_salary])
            ->andFilterWhere(['like', 'monthly_salary', $this->monthly_salary])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'id_proof', $this->id_proof])
            ->andFilterWhere(['like', 'address_proof', $this->address_proof])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'account_name', $this->account_name])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'ifsc_code', $this->ifsc_code]);

        return $dataProvider;
    }
}
