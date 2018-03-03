<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebSetting;

/**
 * WebSettingSearch represents the model behind the search form of `common\models\WebSetting`.
 */
class WebSettingSearch extends WebSetting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['settingID'], 'integer'],
            [['settingSiteTitle', 'settingSiteDescription', 'settingMetaKeyword', 'settingCredits', 'settingFoto'], 'safe'],
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
        $query = WebSetting::find();

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
            'settingID' => $this->settingID,
        ]);

        $query->andFilterWhere(['like', 'settingSiteTitle', $this->settingSiteTitle])
            ->andFilterWhere(['like', 'settingSiteDescription', $this->settingSiteDescription])
            ->andFilterWhere(['like', 'settingMetaKeyword', $this->settingMetaKeyword])
            ->andFilterWhere(['like', 'settingCredits', $this->settingCredits])
            ->andFilterWhere(['like', 'settingFoto', $this->settingFoto]);

        return $dataProvider;
    }
}
