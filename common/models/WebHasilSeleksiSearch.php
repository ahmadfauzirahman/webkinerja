<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebHasilSeleksi;

/**
 * WebHasilSeleksiSearch represents the model behind the search form of `common\models\WebHasilSeleksi`.
 */
class WebHasilSeleksiSearch extends WebHasilSeleksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hasilSeleksiID', 'hasilSeleksiSeleksiID', 'hasilSeleksiUserID', 'hasilSeleksiLamaranID'], 'integer'],
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
        $query = WebHasilSeleksi::find();

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
            'hasilSeleksiSeleksiID' => $this->hasilSeleksiSeleksiID,
            'hasilSeleksiUserID' => $this->hasilSeleksiUserID,
            'hasilSeleksiLamaranID' => $this->hasilSeleksiLamaranID,
        ]);

        $query->andFilterWhere(['like', 'hasilSeleksiHasil', $this->hasilSeleksiHasil])
            ->andFilterWhere(['like', 'hasilSeleksiKeterangan', $this->hasilSeleksiKeterangan])
            ->andFilterWhere(['like', 'hasilSeleksiStatus', $this->hasilSeleksiStatus]);

        return $dataProvider;
    }
}
