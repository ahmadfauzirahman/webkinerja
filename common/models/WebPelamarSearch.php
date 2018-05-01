<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebPelamar;

/**
 * WebPelamarSearch represents the model behind the search form of `common\models\WebPelamar`.
 */
class WebPelamarSearch extends WebPelamar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelamarID', 'pelamarUserID'], 'integer'],
            [['pelamarNama', 'pelamarJK', 'pelamarTmptLahir', 'pelamarTglLahir', 'pelamarKewarganegaraan', 'pelamarTinggiBadan', 'pelamarBeratBadan', 'pelamarGolDarah', 'pelamarAgama', 'pelamarAlamat', 'pelamarTelfon', 'pelamarEmail', 'pelamarPendididkanFormal', 'pelamarPendidikanNonFormal', 'pelamarKemampuan', 'pelamarPengalamanAkademik', 'pelamarPengalamanKerja', 'pelamarFoto', 'pelamarNamaAyah', 'pelamarPekerjaanAyah', 'pelamarNamaIbu', 'pelamarPekerjaanIbu', 'pelamarStatus'], 'safe'],
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
        $query = WebPelamar::find();

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
            'pelamarID' => $this->pelamarID,
            'pelamarUserID' => $this->pelamarUserID,
            'pelamarTglLahir' => $this->pelamarTglLahir,
        ]);

        $query->andFilterWhere(['like', 'pelamarNama', $this->pelamarNama])
            ->andFilterWhere(['like', 'pelamarJK', $this->pelamarJK])
            ->andFilterWhere(['like', 'pelamarTmptLahir', $this->pelamarTmptLahir])
            ->andFilterWhere(['like', 'pelamarKewarganegaraan', $this->pelamarKewarganegaraan])
            ->andFilterWhere(['like', 'pelamarTinggiBadan', $this->pelamarTinggiBadan])
            ->andFilterWhere(['like', 'pelamarBeratBadan', $this->pelamarBeratBadan])
            ->andFilterWhere(['like', 'pelamarGolDarah', $this->pelamarGolDarah])
            ->andFilterWhere(['like', 'pelamarAgama', $this->pelamarAgama])
            ->andFilterWhere(['like', 'pelamarAlamat', $this->pelamarAlamat])
            ->andFilterWhere(['like', 'pelamarTelfon', $this->pelamarTelfon])
            ->andFilterWhere(['like', 'pelamarEmail', $this->pelamarEmail])
            ->andFilterWhere(['like', 'pelamarPendididkanFormal', $this->pelamarPendididkanFormal])
            ->andFilterWhere(['like', 'pelamarPendidikanNonFormal', $this->pelamarPendidikanNonFormal])
            ->andFilterWhere(['like', 'pelamarKemampuan', $this->pelamarKemampuan])
            ->andFilterWhere(['like', 'pelamarPengalamanAkademik', $this->pelamarPengalamanAkademik])
            ->andFilterWhere(['like', 'pelamarPengalamanKerja', $this->pelamarPengalamanKerja])
            ->andFilterWhere(['like', 'pelamarFoto', $this->pelamarFoto])
            ->andFilterWhere(['like', 'pelamarNamaAyah', $this->pelamarNamaAyah])
            ->andFilterWhere(['like', 'pelamarPekerjaanAyah', $this->pelamarPekerjaanAyah])
            ->andFilterWhere(['like', 'pelamarNamaIbu', $this->pelamarNamaIbu])
            ->andFilterWhere(['like', 'pelamarPekerjaanIbu', $this->pelamarPekerjaanIbu])
            ->andFilterWhere(['like', 'pelamarStatus', $this->pelamarStatus]);

        return $dataProvider;
    }
}
