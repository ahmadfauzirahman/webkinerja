<?php

namespace frontend\models\User;

use Yii;

/**
 * This is the model class for table "web_pelamar".
 *
 * @property int $pelamarID
 * @property int $pelamarUserID
 * @property string $pelamarNama
 * @property string $pelamarJK
 * @property string $pelamarTmptLahir
 * @property string $pelamarTglLahir
 * @property string $pelamarKewarganegaraan
 * @property string $pelamarTinggiBadan
 * @property string $pelamarBeratBadan
 * @property string $pelamarGolDarah
 * @property string $pelamarAgama
 * @property string $pelamarAlamat
 * @property string $pelamarTelfon
 * @property string $pelamarEmail
 * @property string $pelamarPendididkanFormal
 * @property string $pelamarPendidikanNonFormal
 * @property string $pelamarKemampuan
 * @property string $pelamarPengalamanAkademik
 * @property string $pelamarPengalamanKerja
 * @property string $pelamarFoto
 * @property string $pelamarNamaAyah
 * @property string $pelamarNamaIbu
 * @property string $pelamarPekerjaanIbu
 * @property string $pelamarStatus
 */
class DashboardPelamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_pelamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelamarUserID'], 'integer'],
            [['pelamarUserID'], 'default', 'value' => Yii::$app->user->identity->userID],
            [['pelamarTglLahir'], 'safe'],
            [['pelamarAlamat', 'pelamarPendididkanFormal', 'pelamarPendidikanNonFormal', 'pelamarKemampuan', 'pelamarPengalamanAkademik', 'pelamarPengalamanKerja', 'pelamarFoto', 'pelamarStatus'], 'string'],
            [['pelamarNama', 'pelamarTmptLahir', 'pelamarKewarganegaraan', 'pelamarTelfon', 'pelamarNamaAyah', 'pelamarNamaIbu', 'pelamarPekerjaanIbu', 'pelamarPekerjaanAyah'], 'string', 'max' => 100],
            [['pelamarJK', 'pelamarGolDarah'], 'string', 'max' => 10],
            [['pelamarTinggiBadan', 'pelamarBeratBadan'], 'double'],
            [['pelamarAgama', 'pelamarEmail'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelamarID' => 'ID Pelamar',
            'pelamarUserID' => 'ID User',
            'pelamarNama' => 'Nama Lengkap',
            'pelamarJK' => 'Jenis Kelamin',
            'pelamarTmptLahir' => 'Tempat Lahir',
            'pelamarTglLahir' => 'Tanggal Lahir',
            'pelamarKewarganegaraan' => 'Kewarganegaraan',
            'pelamarTinggiBadan' => 'Tinggi Badan',
            'pelamarBeratBadan' => 'Berat Badan',
            'pelamarGolDarah' => 'Gol. Darah',
            'pelamarAgama' => 'Agama',
            'pelamarAlamat' => 'Alamat',
            'pelamarTelfon' => 'No. Telfon',
            'pelamarEmail' => 'Email',
            'pelamarPendididkanFormal' => 'Pendididkan Formal',
            'pelamarPendidikanNonFormal' => 'Pendidikan Non Formal',
            'pelamarKemampuan' => 'Kemampuan/Keahlian',
            'pelamarPengalamanAkademik' => 'Pengalaman Akademik',
            'pelamarPengalamanKerja' => 'Pengalaman Kerja',
            'pelamarFoto' => 'Foto',
            'pelamarNamaAyah' => 'Nama Ayah (Kandung)',
            'pelamarNamaIbu' => 'Nama Ibu (Kandung)',
            'pelamarPekerjaanIbu' => 'Pekerjaan Ibu',
            'pelamarPekerjaanAyah' => 'Pekerjaan Ayah',
            'pelamarStatus' => 'Status Pelamar',
        ];
    }
}
