<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebSeleksi;

/**
 * WebSeleksiSearch represents the model behind the search form of `common\models\WebSeleksi`.
 */
class WebSeleksiSearch extends WebSeleksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seleksiID', 'seleksiLowonganID', 'seleksiKategoriSeleksiID'], 'integer'],
            [['seleksiNama', 'seleksiTglAwal', 'seleksiTglAkhir', 'seleksiTempat', 'seleksiRuangan', 'seleksiKeterangan', 'seleksiStatus'], 'safe'],
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
        $query = WebSeleksi::find();

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
            'seleksiID' => $this->seleksiID,
            'seleksiLowonganID' => $this->seleksiLowonganID,
            'seleksiKategoriSeleksiID' => $this->seleksiKategoriSeleksiID,
            'seleksiTglAwal' => $this->seleksiTglAwal,
            'seleksiTglAkhir' => $this->seleksiTglAkhir,
        ]);

        $query->andFilterWhere(['like', 'seleksiNama', $this->seleksiNama])
            ->andFilterWhere(['like', 'seleksiTempat', $this->seleksiTempat])
            ->andFilterWhere(['like', 'seleksiRuangan', $this->seleksiRuangan])
            ->andFilterWhere(['like', 'seleksiKeterangan', $this->seleksiKeterangan])
            ->andFilterWhere(['like', 'seleksiStatus', $this->seleksiStatus]);

        return $dataProvider;
    }
}
