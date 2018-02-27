<?php

namespace common\models\WebArtikel;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebArtikel\WebArtikel;

/**
 * WebArtikelSearch represents the model behind the search form of `common\models\WebArtikel\WebArtikel`.
 */
class WebArtikelSearch extends WebArtikel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artikelID', 'artikelKategoriID', 'artikelUserID'], 'integer'],
            [['artikelJudul', 'artikelIsi', 'artikelThumbnails', 'artikelTglPost', 'artikeReader', 'artikelStatus'], 'safe'],
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
        $query = WebArtikel::find();

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
            'artikelID' => $this->artikelID,
            'artikelKategoriID' => $this->artikelKategoriID,
            'artikelUserID' => $this->artikelUserID,
            'artikelTglPost' => $this->artikelTglPost,
        ]);

        $query->andFilterWhere(['like', 'artikelJudul', $this->artikelJudul])
            ->andFilterWhere(['like', 'artikelIsi', $this->artikelIsi])
            ->andFilterWhere(['like', 'artikelThumbnails', $this->artikelThumbnails])
            ->andFilterWhere(['like', 'artikeReader', $this->artikeReader])
            ->andFilterWhere(['like', 'artikelStatus', $this->artikelStatus]);

        return $dataProvider;
    }
}
