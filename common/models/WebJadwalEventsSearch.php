<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebJadwalEvents;

/**
 * WebJadwalEventsSearch represents the model behind the search form of `common\models\WebJadwalEvents`.
 */
class WebJadwalEventsSearch extends WebJadwalEvents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwalEventsID', 'jadwalEventsEventsID'], 'integer'],
            [['jadwalEventsTglMulai', 'jadwalEventsTglSelesai', 'jadwalEventsNama', 'jadwalEventsStatus'], 'safe'],
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
    public function search($params, $id)
    {
        $query = WebJadwalEvents::find()->where(['jadwalEventsEventsID'=>$id]);

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
            'jadwalEventsID' => $this->jadwalEventsID,
            'jadwalEventsEventsID' => $this->jadwalEventsEventsID,
            'jadwalEventsTglMulai' => $this->jadwalEventsTglMulai,
            'jadwalEventsTglSelesai' => $this->jadwalEventsTglSelesai,
        ]);

        $query->andFilterWhere(['like', 'jadwalEventsNama', $this->jadwalEventsNama])
            ->andFilterWhere(['like', 'jadwalEventsStatus', $this->jadwalEventsStatus]);

        return $dataProvider;
    }
}
