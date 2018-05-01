<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebLamaran;

/**
 * WebLamaranSearch represents the model behind the search form of `common\models\WebLamaran`.
 */
class WebLamaranSearch extends WebLamaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lamaranID', 'lamaranUserID', 'lamaranLowonganID'], 'integer'],
            [['lamaranPermohonan', 'lamaranTglMelamar', 'lamaranKeteranganLamaran', 'lamaranStatus'], 'safe'],
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
        $query = WebLamaran::find();

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
            'lamaranID' => $this->lamaranID,
            'lamaranUserID' => $this->lamaranUserID,
            'lamaranLowonganID' => $this->lamaranLowonganID,
            'lamaranTglMelamar' => $this->lamaranTglMelamar,
        ]);

        $query->andFilterWhere(['like', 'lamaranPermohonan', $this->lamaranPermohonan])
            ->andFilterWhere(['like', 'lamaranKeteranganLamaran', $this->lamaranKeteranganLamaran])
            ->andFilterWhere(['like', 'lamaranStatus', $this->lamaranStatus]);

        return $dataProvider;
    }
}
