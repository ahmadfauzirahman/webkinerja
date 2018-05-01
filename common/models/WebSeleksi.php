<?php

namespace common\models;

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
class WebSeleksi extends \yii\db\ActiveRecord
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
            'seleksiID' => 'Seleksi ID',
            'seleksiLowonganID' => 'Seleksi Lowongan ID',
            'seleksiKategoriSeleksiID' => 'Seleksi Kategori Seleksi ID',
            'seleksiNama' => 'Seleksi Nama',
            'seleksiTglAwal' => 'Seleksi Tgl Awal',
            'seleksiTglAkhir' => 'Seleksi Tgl Akhir',
            'seleksiTempat' => 'Seleksi Tempat',
            'seleksiRuangan' => 'Seleksi Ruangan',
            'seleksiKeterangan' => 'Seleksi Keterangan',
            'seleksiStatus' => 'Seleksi Status',
        ];
    }
}
