<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WebBooking;

/**
 * WebBookingSearch represents the model behind the search form of `common\models\WebBooking`.
 */
class WebBookingSearch extends WebBooking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookingID', 'bookingEventsID', 'bookingStandsID', 'bookingJnsIndustriID'], 'integer'],
            [['bookingPerusahaanEmail', 'bookingPerusahaanNama', 'bookingPerusahaanTelfon', 'bookingPerusahaanNamaOfficer', 'bookingPerusahaanJbtnOfficer', 'bookingPerusahaanTelfonOfficer', 'bookingCatatan', 'bookingBuktiPembayaran', 'bookingStatus'], 'safe'],
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
        $query = WebBooking::find()->where(['bookingEventsID'=>$id]);

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
            'bookingID' => $this->bookingID,
            'bookingEventsID' => $this->bookingEventsID,
            'bookingStandsID' => $this->bookingStandsID,
            'bookingJnsIndustriID' => $this->bookingJnsIndustriID,
        ]);

        $query->andFilterWhere(['like', 'bookingPerusahaanEmail', $this->bookingPerusahaanEmail])
            ->andFilterWhere(['like', 'bookingPerusahaanNama', $this->bookingPerusahaanNama])
            ->andFilterWhere(['like', 'bookingPerusahaanTelfon', $this->bookingPerusahaanTelfon])
            ->andFilterWhere(['like', 'bookingPerusahaanNamaOfficer', $this->bookingPerusahaanNamaOfficer])
            ->andFilterWhere(['like', 'bookingPerusahaanJbtnOfficer', $this->bookingPerusahaanJbtnOfficer])
            ->andFilterWhere(['like', 'bookingPerusahaanTelfonOfficer', $this->bookingPerusahaanTelfonOfficer])
            ->andFilterWhere(['like', 'bookingCatatan', $this->bookingCatatan])
            ->andFilterWhere(['like', 'bookingBuktiPembayaran', $this->bookingBuktiPembayaran])
            ->andFilterWhere(['like', 'bookingStatus', $this->bookingStatus]);

        return $dataProvider;
    }
}
