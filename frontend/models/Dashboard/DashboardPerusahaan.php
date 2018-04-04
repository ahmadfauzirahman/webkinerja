<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "web_perusahaan".
 *
 * @property int $perusahaanID
 * @property int $perusahaanUserID
 * @property string $perusahaanNama
 * @property int $perusahaanJnsIndustriID
 * @property string $perusahaanAlamat
 * @property string $perusahaanEmail
 * @property string $perusahaanLink
 * @property string $perusahaanTelfon
 * @property int $perusahaanNegaraID
 * @property int $perusahaanProvinsiID
 * @property int $perusahaanKotaID
 * @property string $perusahaanKodePos
 * @property string $perusahaanProfil
 * @property string $perusahaanNamaOfficer
 * @property string $perusahaanEmailOfficer
 * @property string $perusahaanTelfonOfficer
 * @property string $perusahanHpOfficer
 * @property string $perusahaanStatus
 */
class DashboardPerusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_perusahaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perusahaanUserID', 'perusahaanJnsIndustriID', 'perusahaanProvinsiID', 'perusahaanKotaID'], 'integer'],
            [['perusahaanNama', 'perusahaanNegaraID', 'perusahaanAlamat', 'perusahaanLink', 'perusahaanProfil', 'perusahaanStatus'], 'string'],
            [['perusahaanEmail'], 'string', 'max' => 200],
            [['perusahaanTelfon', 'perusahaanKodePos', 'perusahaanTelfonOfficer', 'perusahanHpOfficer'], 'string', 'max' => 20],
            [['perusahaanNamaOfficer', 'perusahaanEmailOfficer'], 'string', 'max' => 50],
            [
                ['perusahaanFoto'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg, jpeg' ,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perusahaanID' => 'ID Perusahaan',
            'perusahaanUserID' => 'User ID Perusahaan',
            'perusahaanNama' => 'Nama Perusahaan',
            'perusahaanJnsIndustriID' => 'Jenis Perusahaan',
            'perusahaanAlamat' => 'Alamat Perusahaan',
            'perusahaanEmail' => 'Email Perusahaan',
            'perusahaanLink' => 'Link Situs Perusahaan',
            'perusahaanTelfon' => 'No. Telepon Perusahaan',
            'perusahaanNegaraID' => 'Negara',
            'perusahaanProvinsiID' => 'Provinsi',
            'perusahaanKotaID' => 'Kota',
            'perusahaanKodePos' => 'Kode Pos',
            'perusahaanProfil' => 'Profil Perusahaan',
            'perusahaanNamaOfficer' => 'Nama Officer',
            'perusahaanEmailOfficer' => 'Email Officer',
            'perusahaanTelfonOfficer' => 'No. Telepon Officer',
            'perusahanHpOfficer' => 'No. Handphone Officer',
            'perusahaanStatus' => 'Status Perusahaan',
            'perusahaanFoto' => 'Logo Perusahaan',
        ];
    }
}
