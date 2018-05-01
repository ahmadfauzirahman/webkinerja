<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebArtikelKomentar;

/**
 * WebArtikelKomentarSearch represents the model behind the search form of `common\models\WebArtikelKomentar`.
 */
class WebArtikelKomentarSearch extends WebArtikelKomentar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artikelKomentarID', 'artikelKomentarArtikelID'], 'integer'],
            [['artikelKomentarEmail', 'artikelKomentarNama', 'artikelKomentarIsi', 'artikelKomentarTglPost', 'artikelKomentarStatus'], 'safe'],
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
        $query = WebArtikelKomentar::find();

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
            'artikelKomentarID' => $this->artikelKomentarID,
            'artikelKomentarArtikelID' => $this->artikelKomentarArtikelID,
            'artikelKomentarTglPost' => $this->artikelKomentarTglPost,
        ]);

        $query->andFilterWhere(['like', 'artikelKomentarEmail', $this->artikelKomentarEmail])
            ->andFilterWhere(['like', 'artikelKomentarNama', $this->artikelKomentarNama])
            ->andFilterWhere(['like', 'artikelKomentarIsi', $this->artikelKomentarIsi])
            ->andFilterWhere(['like', 'artikelKomentarStatus', $this->artikelKomentarStatus]);

        return $dataProvider;
    }
}
