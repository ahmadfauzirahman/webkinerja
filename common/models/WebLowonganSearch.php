<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebLowongan;

/**
 * WebLowonganSearch represents the model behind the search form of `common\models\WebLowongan`.
 */
class WebLowonganSearch extends WebLowongan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lowonganID', 'lowonganPerusahaanID', 'lowonganKategoriLowonganID'], 'integer'],
            [['lowonganNama', 'lowonganFungsiPekerjaan', 'lowonganLevelPekerjaan', 'lowonganTipePekerjaan', 'lowonganStatusPekerjaan', 'lowonganSyaratUmum', 'lowonganJenjangPendidikan', 'lowonganJurusan', 'lowonganIpkMinimal', 'lowonganSyaratKhusus', 'lowonganJobDesk', 'lowonganKeterangan', 'lowonganTglPost', 'lowonganValid', 'lowonganDaftarOnline', 'lowonganStatus'], 'safe'],
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
        $query = WebLowongan::find();

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
            'lowonganID' => $this->lowonganID,
            'lowonganPerusahaanID' => $this->lowonganPerusahaanID,
            'lowonganKategoriLowonganID' => $this->lowonganKategoriLowonganID,
            'lowonganTglPost' => $this->lowonganTglPost,
        ]);

        $query->andFilterWhere(['like', 'lowonganNama', $this->lowonganNama])
            ->andFilterWhere(['like', 'lowonganFungsiPekerjaan', $this->lowonganFungsiPekerjaan])
            ->andFilterWhere(['like', 'lowonganLevelPekerjaan', $this->lowonganLevelPekerjaan])
            ->andFilterWhere(['like', 'lowonganTipePekerjaan', $this->lowonganTipePekerjaan])
            ->andFilterWhere(['like', 'lowonganStatusPekerjaan', $this->lowonganStatusPekerjaan])
            ->andFilterWhere(['like', 'lowonganSyaratUmum', $this->lowonganSyaratUmum])
            ->andFilterWhere(['like', 'lowonganJenjangPendidikan', $this->lowonganJenjangPendidikan])
            ->andFilterWhere(['like', 'lowonganJurusan', $this->lowonganJurusan])
            ->andFilterWhere(['like', 'lowonganIpkMinimal', $this->lowonganIpkMinimal])
            ->andFilterWhere(['like', 'lowonganSyaratKhusus', $this->lowonganSyaratKhusus])
            ->andFilterWhere(['like', 'lowonganJobDesk', $this->lowonganJobDesk])
            ->andFilterWhere(['like', 'lowonganKeterangan', $this->lowonganKeterangan])
            ->andFilterWhere(['like', 'lowonganValid', $this->lowonganValid])
            ->andFilterWhere(['like', 'lowonganDaftarOnline', $this->lowonganDaftarOnline])
            ->andFilterWhere(['like', 'lowonganStatus', $this->lowonganStatus]);

        return $dataProvider;
    }
}
