<?php

namespace frontend\models\Dashboard;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dashboard\DashboardPerusahaanLamaran;

/**
 * DashboardPerusahaanLamaranSearch represents the model behind the search form of `frontend\models\Dashboard\DashboardPerusahaanLamaran`.
 */
class DashboardPerusahaanLamaranSearch extends DashboardPerusahaanLamaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lamaranID', 'lamaranUserID', 'lamaranLowonganID'], 'integer'],
            [['lamaranPermohonan', 'lamaranTglMelamar', 'lamaranKeteranganLamaran', 'lamaranStatus', 'lamaranRekomendasi'], 'safe'],
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
        $query = DashboardPerusahaanLamaran::find()->orderBy(['lamaranRekomendasi' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
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
            'lamaranID' => $this->lamaranID,
            'lamaranUserID' => $this->lamaranUserID,
            'lamaranLowonganID' => $this->lamaranLowonganID,
//            'lamaranTglMelamar' => $this->lamaranTglMelamar,
        ]);

        $query->andFilterWhere(['like', 'lamaranPermohonan', $this->lamaranPermohonan])
            ->andFilterWhere(['like', 'lamaranKeteranganLamaran', $this->lamaranKeteranganLamaran])
            ->andFilterWhere(['like', 'lamaranStatus', $this->lamaranStatus])
            ->andFilterWhere(['<=', 'lamaranTglMelamar', $this->lamaranTglMelamar])
            ->andFilterWhere(['like', 'lamaranRekomendasi', $this->lamaranRekomendasi]);

        return $dataProvider;
    }
}
