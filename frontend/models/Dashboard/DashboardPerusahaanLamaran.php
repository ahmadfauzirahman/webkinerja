<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "web_lamaran".
 *
 * @property int $lamaranID
 * @property int $lamaranUserID
 * @property int $lamaranLowonganID
 * @property string $lamaranPermohonan
 * @property string $lamaranTglMelamar
 * @property string $lamaranKeteranganLamaran
 * @property string $lamaranStatus
 * @property string $lamaranRekomendasi
 */
class DashboardPerusahaanLamaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_lamaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lamaranUserID', 'lamaranLowonganID'], 'integer'],
            [['lamaranPermohonan', 'lamaranKeteranganLamaran', 'lamaranStatus', 'lamaranRekomendasi'], 'string'],
            [['lamaranTglMelamar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lamaranID' => 'ID Lamaran',
            'lamaranUserID' => 'Nama Pelamar',
            'lamaranLowonganID' => 'Lowongan',
            'lamaranPermohonan' => 'Permohonan',
            'lamaranTglMelamar' => 'Tgl Melamar',
            'lamaranKeteranganLamaran' => 'Keterangan',
            'lamaranStatus' => 'Status',
            'lamaranRekomendasi' => 'Rekomendasi',
        ];
    }
}
