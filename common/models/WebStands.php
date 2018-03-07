<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_stands".
 *
 * @property int $standsID
 * @property int $standsVenueID
 * @property int $standsEventsID
 * @property string $standsNama
 * @property int $standsKategoriStandID
 * @property int $standsPerusahaanID
 * @property string $standsStatus
 */
class WebStands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_stands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['standsVenueID', 'standsEventsID', 'standsKategoriStandID', 'standsPerusahaanID'], 'integer'],
            [['standsEventsID'], 'exist',
                'targetClass' => \common\models\WebEvents::className(),
                'targetAttribute' => 'eventsID', 'message' => 'ID Event Tidak Ditemukan'],
            [['standsKategoriStandID'], 'exist',
                'targetClass' => \common\models\WebKategoriStand::className(),
                'targetAttribute' => 'kategoriStandID', 'message' => 'ID Kategori Tidak Ditemukan'],
            [['standsVenueID'], 'exist',
                'targetClass' => \common\models\WebVenue::className(),
                'targetAttribute' => 'venueID', 'message' => 'ID Venue Tidak Ditemukan'],
            [['standsStatus'], 'string'],
            [['standsNama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'standsID' => 'Stands ID',
            'standsVenueID' => 'Venue',
            'standsEventsID' => 'Nama Event',
            'standsNama' => 'Nama Stand',
            'standsKategoriStandID' => 'Kategori Stand',
            'standsPerusahaanID' => 'Nama Perusahaan',
            'standsStatus' => 'Status',
        ];
    }
}
