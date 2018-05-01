<?php

namespace common\models;

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
 * @property string $pelamarPekerjaanAyah
 * @property string $pelamarNamaIbu
 * @property string $pelamarPekerjaanIbu
 * @property string $pelamarStatus
 */
class WebPelamar extends \yii\db\ActiveRecord
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
            [['pelamarTglLahir'], 'safe'],
            [['pelamarAlamat', 'pelamarPendididkanFormal', 'pelamarPendidikanNonFormal', 'pelamarKemampuan', 'pelamarPengalamanAkademik', 'pelamarPengalamanKerja', 'pelamarFoto', 'pelamarStatus'], 'string'],
            [['pelamarNama', 'pelamarTmptLahir', 'pelamarKewarganegaraan', 'pelamarTelfon', 'pelamarNamaAyah', 'pelamarPekerjaanAyah', 'pelamarNamaIbu', 'pelamarPekerjaanIbu'], 'string', 'max' => 100],
            [['pelamarJK', 'pelamarTinggiBadan', 'pelamarBeratBadan', 'pelamarGolDarah'], 'string', 'max' => 10],
            [['pelamarAgama', 'pelamarEmail'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelamarID' => 'Pelamar ID',
            'pelamarUserID' => 'Pelamar User ID',
            'pelamarNama' => 'Pelamar Nama',
            'pelamarJK' => 'Pelamar Jk',
            'pelamarTmptLahir' => 'Pelamar Tmpt Lahir',
            'pelamarTglLahir' => 'Pelamar Tgl Lahir',
            'pelamarKewarganegaraan' => 'Pelamar Kewarganegaraan',
            'pelamarTinggiBadan' => 'Pelamar Tinggi Badan',
            'pelamarBeratBadan' => 'Pelamar Berat Badan',
            'pelamarGolDarah' => 'Pelamar Gol Darah',
            'pelamarAgama' => 'Pelamar Agama',
            'pelamarAlamat' => 'Pelamar Alamat',
            'pelamarTelfon' => 'Pelamar Telfon',
            'pelamarEmail' => 'Pelamar Email',
            'pelamarPendididkanFormal' => 'Pelamar Pendididkan Formal',
            'pelamarPendidikanNonFormal' => 'Pelamar Pendidikan Non Formal',
            'pelamarKemampuan' => 'Pelamar Kemampuan',
            'pelamarPengalamanAkademik' => 'Pelamar Pengalaman Akademik',
            'pelamarPengalamanKerja' => 'Pelamar Pengalaman Kerja',
            'pelamarFoto' => 'Pelamar Foto',
            'pelamarNamaAyah' => 'Pelamar Nama Ayah',
            'pelamarPekerjaanAyah' => 'Pelamar Pekerjaan Ayah',
            'pelamarNamaIbu' => 'Pelamar Nama Ibu',
            'pelamarPekerjaanIbu' => 'Pelamar Pekerjaan Ibu',
            'pelamarStatus' => 'Pelamar Status',
        ];
    }
}
