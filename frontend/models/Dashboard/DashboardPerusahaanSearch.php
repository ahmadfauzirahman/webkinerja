<?php

namespace frontend\models\Dashboard;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dashboard\DashboardPerusahaan;

/**
 * DashboardPerusahaanSearch represents the model behind the search form of `frontend\models\Dashboard\DashboardPerusahaan`.
 */
class DashboardPerusahaanSearch extends DashboardPerusahaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perusahaanID', 'perusahaanUserID', 'perusahaanJnsIndustriID', 'perusahaanNegaraID', 'perusahaanProvinsiID', 'perusahaanKotaID'], 'integer'],
            [['perusahaanNama', 'perusahaanAlamat', 'perusahaanEmail', 'perusahaanLink', 'perusahaanTelfon', 'perusahaanKodePos', 'perusahaanProfil', 'perusahaanNamaOfficer', 'perusahaanEmailOfficer', 'perusahaanTelfonOfficer', 'perusahanHpOfficer', 'perusahaanStatus'], 'safe'],
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
        $query = DashboardPerusahaan::find();

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
            'perusahaanID' => $this->perusahaanID,
            'perusahaanUserID' => $this->perusahaanUserID,
            'perusahaanJnsIndustriID' => $this->perusahaanJnsIndustriID,
            'perusahaanNegaraID' => $this->perusahaanNegaraID,
            'perusahaanProvinsiID' => $this->perusahaanProvinsiID,
            'perusahaanKotaID' => $this->perusahaanKotaID,
        ]);

        $query->andFilterWhere(['like', 'perusahaanNama', $this->perusahaanNama])
            ->andFilterWhere(['like', 'perusahaanAlamat', $this->perusahaanAlamat])
            ->andFilterWhere(['like', 'perusahaanEmail', $this->perusahaanEmail])
            ->andFilterWhere(['like', 'perusahaanLink', $this->perusahaanLink])
            ->andFilterWhere(['like', 'perusahaanTelfon', $this->perusahaanTelfon])
            ->andFilterWhere(['like', 'perusahaanKodePos', $this->perusahaanKodePos])
            ->andFilterWhere(['like', 'perusahaanProfil', $this->perusahaanProfil])
            ->andFilterWhere(['like', 'perusahaanNamaOfficer', $this->perusahaanNamaOfficer])
            ->andFilterWhere(['like', 'perusahaanEmailOfficer', $this->perusahaanEmailOfficer])
            ->andFilterWhere(['like', 'perusahaanTelfonOfficer', $this->perusahaanTelfonOfficer])
            ->andFilterWhere(['like', 'perusahanHpOfficer', $this->perusahanHpOfficer])
            ->andFilterWhere(['like', 'perusahaanStatus', $this->perusahaanStatus]);

        return $dataProvider;
    }
}
