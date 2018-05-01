<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_lowongan".
 *
 * @property int $lowonganID
 * @property int $lowonganPerusahaanID
 * @property int $lowonganKategoriLowonganID
 * @property string $lowonganNama
 * @property string $lowonganFungsiPekerjaan
 * @property string $lowonganLevelPekerjaan
 * @property string $lowonganTipePekerjaan
 * @property string $lowonganStatusPekerjaan
 * @property string $lowonganSyaratUmum
 * @property string $lowonganJenjangPendidikan
 * @property string $lowonganJurusan
 * @property string $lowonganIpkMinimal
 * @property string $lowonganSyaratKhusus
 * @property string $lowonganJobDesk
 * @property string $lowonganKeterangan
 * @property string $lowonganTglPost
 * @property string $lowonganValid
 * @property string $lowonganDaftarOnline
 * @property string $lowonganStatus
 */
class WebLowongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_lowongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lowonganPerusahaanID', 'lowonganKategoriLowonganID'], 'integer'],
            [['lowonganNama', 'lowonganStatusPekerjaan', 'lowonganSyaratUmum', 'lowonganJenjangPendidikan', 'lowonganJurusan', 'lowonganSyaratKhusus', 'lowonganJobDesk', 'lowonganKeterangan', 'lowonganValid', 'lowonganDaftarOnline', 'lowonganStatus'], 'string'],
            [['lowonganTglPost'], 'safe'],
            [['lowonganFungsiPekerjaan', 'lowonganLevelPekerjaan', 'lowonganTipePekerjaan'], 'string', 'max' => 100],
            [['lowonganIpkMinimal'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lowonganID' => 'Lowongan ID',
            'lowonganPerusahaanID' => 'Lowongan Perusahaan ID',
            'lowonganKategoriLowonganID' => 'Lowongan Kategori Lowongan ID',
            'lowonganNama' => 'Lowongan Nama',
            'lowonganFungsiPekerjaan' => 'Lowongan Fungsi Pekerjaan',
            'lowonganLevelPekerjaan' => 'Lowongan Level Pekerjaan',
            'lowonganTipePekerjaan' => 'Lowongan Tipe Pekerjaan',
            'lowonganStatusPekerjaan' => 'Lowongan Status Pekerjaan',
            'lowonganSyaratUmum' => 'Lowongan Syarat Umum',
            'lowonganJenjangPendidikan' => 'Lowongan Jenjang Pendidikan',
            'lowonganJurusan' => 'Lowongan Jurusan',
            'lowonganIpkMinimal' => 'Lowongan Ipk Minimal',
            'lowonganSyaratKhusus' => 'Lowongan Syarat Khusus',
            'lowonganJobDesk' => 'Lowongan Job Desk',
            'lowonganKeterangan' => 'Lowongan Keterangan',
            'lowonganTglPost' => 'Lowongan Tgl Post',
            'lowonganValid' => 'Lowongan Valid',
            'lowonganDaftarOnline' => 'Lowongan Daftar Online',
            'lowonganStatus' => 'Lowongan Status',
        ];
    }
}
