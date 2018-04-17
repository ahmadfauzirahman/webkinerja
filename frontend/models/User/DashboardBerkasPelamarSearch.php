<?php

namespace frontend\models\User;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User\DashboardBerkasPelamar;

/**
 * DashboardBerkasPelamarSearch represents the model behind the search form of `frontend\models\User\DashboardBerkasPelamar`.
 */
class DashboardBerkasPelamarSearch extends DashboardBerkasPelamar
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
        $query = DashboardBerkasPelamar::find()->where(['berkasPelamarUserID' => Yii::$app->user->identity->userID]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15
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
            'berkasPelamarID' => $this->berkasPelamarID,
            'berkasPelamarUserID' => $this->berkasPelamarUserID,
        ]);

        $query->andFilterWhere(['like', 'berkasPelamarNama', $this->berkasPelamarNama])
            ->andFilterWhere(['like', 'berkasPelamarFile', $this->berkasPelamarFile])
            ->andFilterWhere(['like', 'berkasPelamarStatus', $this->berkasPelamarStatus]);

        return $dataProvider;
    }
}
