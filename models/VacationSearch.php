<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacation;

/**
 * VacationSearch represents the model behind the search form of `app\models\Vacation`.
 */
class VacationSearch extends Vacation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'approve'], 'integer'],
            [['fio', 'date_begin', 'date_end', 'date_create', 'date_update'], 'safe'],
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
        $query = Vacation::find();

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
           // 'id' => $this->id,
            'date_begin' => $this->date_begin,
            'date_end' => $this->date_end,
            'approve' => $this->approve,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['>=', 'date_create', $this->date_create])
            ->andFilterWhere(['>=', 'date_update', $this->date_create]);

        return $dataProvider;
    }
}
