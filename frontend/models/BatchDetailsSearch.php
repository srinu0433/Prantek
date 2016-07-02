<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BatchDetails;

/**
 * BatchDetailsSearch represents the model behind the search form about `frontend\models\BatchDetails`.
 */
class BatchDetailsSearch extends BatchDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mode_of_training', 'training_program', 'session_time', 'created_by'], 'integer'],
            [['batch_no', 'trainer', 'amount', 'created_date', 'modified_date','status'], 'safe'],
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
        $query = BatchDetails::find();

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
            'mode_of_training' => $this->mode_of_training,
            'training_program' => $this->training_program,
            'session_time' => $this->session_time,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        	'status'=>$this->status,
        ]);

        $query->andFilterWhere(['like', 'batch_no', $this->batch_no])
            ->andFilterWhere(['like', 'trainer', $this->trainer])
            ->andFilterWhere(['like', 'amount', $this->amount]);

        return $dataProvider;
    }
}
