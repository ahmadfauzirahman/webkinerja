<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "web_seleksi".
 *
 * @property int $seleksiID
 * @property int $seleksiLowonganID
 * @property int $seleksiKategoriSeleksiID
 * @property string $seleksiNama
 * @property string $seleksiTglAwal
 * @property string $seleksiTglAkhir
 * @property string $seleksiTempat
 * @property string $seleksiRuangan
 * @property string $seleksiKeterangan
 * @property string $seleksiStatus
 */
class DashboardSeleksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_seleksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seleksiLowonganID', 'seleksiKategoriSeleksiID'], 'integer'],
            [['seleksiLokasi'], 'integer'],
            [['seleksiLokasi'], 'required'],
            [['seleksiNama', 'seleksiTempat', 'seleksiRuangan', 'seleksiKeterangan', 'seleksiStatus'], 'string'],
            [['seleksiTglAwal', 'seleksiTglAkhir'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seleksiID' => 'ID Seleksi',
            'seleksiLowonganID' => 'Nama Lowongan',
            'seleksiKategoriSeleksiID' => 'Kategori',
            'seleksiNama' => 'Judul Seleksi',
            'seleksiTglAwal' => 'Tgl. Awal',
            'seleksiTglAkhir' => 'Tgl. Akhir',
            'seleksiLokasi' => 'Lokasi',
            'seleksiTempat' => 'Tempat',
            'seleksiRuangan' => 'Ruangan',
            'seleksiKeterangan' => 'Keterangan',
            'seleksiStatus' => 'Status',
        ];
    }
}
