<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `frontend\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inst_id', 'gender', 'communication', 'status', 'created_by'], 'integer'],
            [['f_name', 'l_name', 'number', 'mobile', 'alternate_mobile', 'email', 'address', 'city', 'state', 'country', 'pincode', 'photo', 'id_proof', 'others', 'created_date', 'modified_date'], 'safe'],
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
        $query = Students::find();

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
            'inst_id' => $this->inst_id,
            'gender' => $this->gender,
            'communication' => $this->communication,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'f_name', $this->f_name])
            ->andFilterWhere(['like', 'l_name', $this->l_name])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'alternate_mobile', $this->alternate_mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'pincode', $this->pincode])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'id_proof', $this->id_proof])
            ->andFilterWhere(['like', 'others', $this->others])
            ->andFilterWhere(['like', 'created_date', $this->created_date]);

        return $dataProvider;
    }
}
