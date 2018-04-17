<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebUserPremium;

/**
 * WebUserPremiumSearch represents the model behind the search form of `common\models\WebUserPremium`.
 */
class WebUserPremiumSearch extends WebUserPremium
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userPremiumID', 'userID'], 'integer'],
            [['userPremiumAwal', 'userPremiumAkhir', 'userPremiumKeterangan', 'userPremiumStatus'], 'safe'],
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
        $query = WebUserPremium::find();

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
            'userPremiumID' => $this->userPremiumID,
            'userID' => $this->userID,
            'userPremiumAwal' => $this->userPremiumAwal,
            'userPremiumAkhir' => $this->userPremiumAkhir,
        ]);

        $query->andFilterWhere(['like', 'userPremiumKeterangan', $this->userPremiumKeterangan])
            ->andFilterWhere(['like', 'userPremiumStatus', $this->userPremiumStatus]);

        return $dataProvider;
    }
}
