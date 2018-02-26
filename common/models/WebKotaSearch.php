<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebKota;

/**
 * WebKotaSearch represents the model behind the search form of `common\models\WebKota`.
 */
class WebKotaSearch extends WebKota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kotaID', 'kotaProvinsiID'], 'integer'],
            [['kotaNama', 'kotaStatus'], 'safe'],
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
        $query = WebKota::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'kotaID' => $this->kotaID,
            'kotaProvinsiID' => $this->kotaProvinsiID,
        ]);

        $query->andFilterWhere(['like', 'kotaNama', $this->kotaNama])
            ->andFilterWhere(['like', 'kotaStatus', $this->kotaStatus]);

        return $dataProvider;
    }
}
