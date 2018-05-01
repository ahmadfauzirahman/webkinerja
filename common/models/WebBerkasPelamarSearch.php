<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebBerkasPelamar;

/**
 * WebBerkasPelamarSearch represents the model behind the search form of `common\models\WebBerkasPelamar`.
 */
class WebBerkasPelamarSearch extends WebBerkasPelamar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['berkasPelamarID', 'berkasPelamarUserID'], 'integer'],
            [['berkasPelamarNama', 'berkasPelamarFile', 'berkasPelamarStatus'], 'safe'],
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
        $query = WebBerkasPelamar::find();

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
            'berkasPelamarID' => $this->berkasPelamarID,
            'berkasPelamarUserID' => $this->berkasPelamarUserID,
        ]);

        $query->andFilterWhere(['like', 'berkasPelamarNama', $this->berkasPelamarNama])
            ->andFilterWhere(['like', 'berkasPelamarFile', $this->berkasPelamarFile])
            ->andFilterWhere(['like', 'berkasPelamarStatus', $this->berkasPelamarStatus]);

        return $dataProvider;
    }
}
