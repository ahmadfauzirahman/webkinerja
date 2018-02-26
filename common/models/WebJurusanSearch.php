<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebJurusan;

/**
 * WebJurusanSearch represents the model behind the search form of `common\models\WebJurusan`.
 */
class WebJurusanSearch extends WebJurusan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jurusanID', 'jurusanFakultasID','jurusanUnivID'], 'integer'],
            [['jurusanNama', 'jurusanStatus'], 'safe'],
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
        $query = WebJurusan::find();

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
            'jurusanID' => $this->jurusanID,
            'jurusanFakultasID' => $this->jurusanFakultasID,
        ]);

        $query->andFilterWhere(['like', 'jurusanNama', $this->jurusanNama])->
        andFilterWhere(['like', 'jurusanUnivID', $this->jurusanUnivID])
            ->andFilterWhere(['like', 'jurusanStatus', $this->jurusanStatus]);

        return $dataProvider;
    }
}