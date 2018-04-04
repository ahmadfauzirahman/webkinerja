<?php

namespace frontend\models\Dashboard;

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
 * @property string $lowonganStatus
 */
class DashboardLowongan extends \yii\db\ActiveRecord
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
            [['lowonganNama', 'lowonganStatusPekerjaan', 'lowonganSyaratUmum', 'lowonganSyaratKhusus', 'lowonganJobDesk', 'lowonganKeterangan', 'lowonganValid', 'lowonganStatus','lowonganDaftarOnline'], 'string'],
            [['lowonganTglPost'], 'safe'],
            [['lowonganJenjangPendidikan','lowonganJurusan'], 'safe'],
            [['lowonganTglPost'], 'default', 'value' => date('Y-m-d h:i:s')],
            [['lowonganFungsiPekerjaan', 'lowonganLevelPekerjaan', 'lowonganTipePekerjaan'], 'string', 'max' => 100],
            [['lowonganIpkMinimal'], 'string', 'max' => 50],
            [['lowonganPerusahaanID'], 'default', 'value' => DashboardPerusahaan::find()->where(['perusahaanUserID' => Yii::$app->user->identity->userID])->one()['perusahaanID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lowonganID' => 'ID Lowongan',
            'lowonganPerusahaanID' => 'Nama Perusahaan',
            'lowonganKategoriLowonganID' => 'Kategori Lowongan',
            'lowonganNama' => 'Judul Lowongan',
            'lowonganFungsiPekerjaan' => 'Tipe Pekerjaan',
            'lowonganLevelPekerjaan' => 'Level Pekerjaan',
            'lowonganTipePekerjaan' => 'Tipe Kerja',
            'lowonganStatusPekerjaan' => 'Status Pekerjaan',
            'lowonganSyaratUmum' => 'Syarat Umum',
            'lowonganJenjangPendidikan' => 'Jenjang Pendidikan',
            'lowonganJurusan' => 'Jurusan',
            'lowonganIpkMinimal' => 'IPK Minimal',
            'lowonganSyaratKhusus' => 'Syarat Khusus',
            'lowonganJobDesk' => 'Job Desk',
            'lowonganKeterangan' => 'Keterangan Lowongan',
            'lowonganTglPost' => 'Tanggal Post',
            'lowonganValid' => 'Batas Pendaftaran',
            'lowonganDaftarOnline' => 'Lamar Online',
            'lowonganStatus' => 'Status Lowongan',
        ];
    }
}
