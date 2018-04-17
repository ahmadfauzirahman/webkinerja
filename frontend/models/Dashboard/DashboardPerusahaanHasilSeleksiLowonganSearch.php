<?php

namespace frontend\models\Dashboard;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan;

/**
 * DashboardPerusahaanHasilSeleksiLowonganSearch represents the model behind the search form of `frontend\models\Dashboard\DashboardPerusahaanHasilSeleksiLowongan`.
 */
class DashboardPerusahaanHasilSeleksiLowonganSearch extends DashboardPerusahaanHasilSeleksiLowongan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hasilSeleksiID', 'hasilSeleksiUserID', 'hasilSeleksiLamaranID', 'hasilSeleksiLowonganID'], 'integer'],
            [['hasilSeleksiHasil', 'hasilSeleksiKeterangan', 'hasilSeleksiStatus'], 'safe'],
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
        $query = DashboardPerusahaanHasilSeleksiLowongan::find();

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
            'hasilSeleksiID' => $this->hasilSeleksiID,
            'hasilSeleksiUserID' => $this->hasilSeleksiUserID,
            'hasilSeleksiLowonganID' => $this->hasilSeleksiLowonganID,
            'hasilSeleksiLamaranID' => $this->hasilSeleksiLamaranID,
        ]);

        $query->andFilterWhere(['like', 'hasilSeleksiHasil', $this->hasilSeleksiHasil])
            ->andFilterWhere(['like', 'hasilSeleksiKeterangan', $this->hasilSeleksiKeterangan])
            ->andFilterWhere(['like', 'hasilSeleksiStatus', $this->hasilSeleksiStatus]);

        return $dataProvider;
    }
}
