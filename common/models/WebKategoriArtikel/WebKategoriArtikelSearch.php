<?php

namespace common\models\WebKategoriArtikel;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebKategoriArtikel\WebKategoriArtikel;

/**
 * WebKategoriArtikelSearch represents the model behind the search form of `common\models\WebKategoriArtikel\WebKategoriArtikel`.
 */
class WebKategoriArtikelSearch extends WebKategoriArtikel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriArtikelID'], 'integer'],
            [['kategoriArtikelNama', 'kategoriArtikelStatus'], 'safe'],
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
        $query = WebKategoriArtikel::find();

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
            'kategoriArtikelID' => $this->kategoriArtikelID,
        ]);

        $query->andFilterWhere(['like', 'kategoriArtikelNama', $this->kategoriArtikelNama])
            ->andFilterWhere(['like', 'kategoriArtikelStatus', $this->kategoriArtikelStatus]);

        return $dataProvider;
    }
}
