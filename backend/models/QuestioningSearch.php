<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Questioning;

/**
 * QuestioningSearch represents the model behind the search form of `common\models\Questioning`.
 */
class QuestioningSearch extends Model
{
    public $sex;
    public $region;
    public $city;

    public $createdAt;
    public $createdAtStart;
    public $createdAtEnd;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdAt'], 'string'],
            [['sex'], 'integer'],
            [['region', 'city'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Questioning::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query
            ->andFilterWhere(['sex' => $this->sex])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city]);

        if ($this->createdAt) {
            list($startTime, $endTime) = explode(' - ', $this->createdAt);
            $this->createdAtStart = strtotime('00:00:00', strtotime($startTime));
            $this->createdAtEnd = strtotime('23:59:59', strtotime($endTime));

            $query->andFilterWhere(['>=', 'created_at', $this->createdAtStart]);
            $query->andFilterWhere(['<=', 'created_at', $this->createdAtEnd]);
        }

        return $dataProvider;
    }
}
