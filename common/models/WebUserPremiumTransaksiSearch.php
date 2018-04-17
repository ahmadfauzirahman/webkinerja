<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebUserPremiumTransaksi;

/**
 * WebUserPremiumTransaksiSearch represents the model behind the search form of `common\models\WebUserPremiumTransaksi`.
 */
class WebUserPremiumTransaksiSearch extends WebUserPremiumTransaksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userPremiumTransaksiID', 'userPremiumID', 'userID'], 'integer'],
            [['userPremiumTransaksiNama', 'userPremiumTransaksiNoRek', 'userPremiumTransaksiTglTransaksi', 'userPremiumTransaksiTglKonfirmasi', 'userPremiumTransaksiNominal', 'userPremiumTransaksiBukti', 'userPremiumTransaksiKeterangan', 'userPremiumTransaksiStatus'], 'safe'],
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
        $query = WebUserPremiumTransaksi::find();

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
            'userPremiumTransaksiID' => $this->userPremiumTransaksiID,
            'userPremiumID' => $this->userPremiumID,
            'userID' => $this->userID,
            'userPremiumTransaksiTglTransaksi' => $this->userPremiumTransaksiTglTransaksi,
            'userPremiumTransaksiTglKonfirmasi' => $this->userPremiumTransaksiTglKonfirmasi,
        ]);

        $query->andFilterWhere(['like', 'userPremiumTransaksiNama', $this->userPremiumTransaksiNama])
            ->andFilterWhere(['like', 'userPremiumTransaksiNoRek', $this->userPremiumTransaksiNoRek])
            ->andFilterWhere(['like', 'userPremiumTransaksiNominal', $this->userPremiumTransaksiNominal])
            ->andFilterWhere(['like', 'userPremiumTransaksiBukti', $this->userPremiumTransaksiBukti])
            ->andFilterWhere(['like', 'userPremiumTransaksiKeterangan', $this->userPremiumTransaksiKeterangan])
            ->andFilterWhere(['like', 'userPremiumTransaksiStatus', $this->userPremiumTransaksiStatus]);

        return $dataProvider;
    }
}
