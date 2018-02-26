<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebFakultas;

/**
 * WebFakultasSearch represents the model behind the search form of `common\models\WebFakultas`.
 */
class WebFakultasSearch extends WebFakultas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultasID', 'fakultasUnivID'], 'integer'],
            [['fakultasNama', 'fakultasStatus'], 'safe'],
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
        $query = WebFakultas::find();

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
            'fakultasID' => $this->fakultasID,
            'fakultasUnivID' => $this->fakultasUnivID,
        ]);

        $query->andFilterWhere(['like', 'fakultasNama', $this->fakultasNama])
            ->andFilterWhere(['like', 'fakultasStatus', $this->fakultasStatus]);

        return $dataProvider;
    }
}
