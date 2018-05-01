<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebKategoriLowongan;

/**
 * WebKategoriLowonganSearch represents the model behind the search form of `common\models\WebKategoriLowongan`.
 */
class WebKategoriLowonganSearch extends WebKategoriLowongan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriLowonganID'], 'integer'],
            [['kategoriLowonganNama', 'kategoriLowonganStatus'], 'safe'],
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
        $query = WebKategoriLowongan::find();

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
            'kategoriLowonganID' => $this->kategoriLowonganID,
        ]);

        $query->andFilterWhere(['like', 'kategoriLowonganNama', $this->kategoriLowonganNama])
            ->andFilterWhere(['like', 'kategoriLowonganStatus', $this->kategoriLowonganStatus]);

        return $dataProvider;
    }
}
