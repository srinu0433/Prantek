<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LookupData;

/**
 * LookupDataSearch represents the model behind the search form about `frontend\models\LookupData`.
 */
class LookupDataSearch extends LookupData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'institute_id', 'drop_down', 'created_by', 'status'], 'integer'],
            [['dd_value', 'created_date', 'modified_date'], 'safe'],
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
        $query = LookupData::find();

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
            'institute_id' => \Yii::$app->user->identity->institute_id,
            'drop_down' => $this->drop_down,
            'created_by' => $this->created_by,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'dd_value', $this->dd_value]);

        return $dataProvider;
    }
}
