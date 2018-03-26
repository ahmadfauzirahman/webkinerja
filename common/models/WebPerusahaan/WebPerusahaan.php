<?php

namespace common\models\WebPerusahaan;

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
class WebPerusahaan extends \yii\db\ActiveRecord
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
            [['perusahaanUserID', 'perusahaanJnsIndustriID', 'perusahaanNegaraID', 'perusahaanProvinsiID', 'perusahaanKotaID'], 'integer'],
            [['perusahaanNama', 'perusahaanAlamat', 'perusahaanLink', 'perusahaanProfil', 'perusahaanStatus'], 'string'],
            [['perusahaanEmail'], 'string', 'max' => 200],
            [['perusahaanTelfon', 'perusahaanKodePos', 'perusahaanTelfonOfficer', 'perusahanHpOfficer'], 'string', 'max' => 20],
            [['perusahaanNamaOfficer', 'perusahaanEmailOfficer'], 'string', 'max' => 50],
            [['perusahaanNama'],'required', 'message' => 'Field ini tidak boleh kosong'],
            [['perusahaanStatus'], 'default', 'value' =>  'Aktif']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perusahaanID' => 'Perusahaan ID',
            'perusahaanUserID' => 'Perusahaan User ID',
            'perusahaanNama' => 'Perusahaan Nama',
            'perusahaanJnsIndustriID' => 'Perusahaan Jns Industri ID',
            'perusahaanAlamat' => 'Perusahaan Alamat',
            'perusahaanEmail' => 'Perusahaan Email',
            'perusahaanLink' => 'Perusahaan Link',
            'perusahaanTelfon' => 'Perusahaan Telfon',
            'perusahaanNegaraID' => 'Perusahaan Negara ID',
            'perusahaanProvinsiID' => 'Perusahaan Provinsi ID',
            'perusahaanKotaID' => 'Perusahaan Kota ID',
            'perusahaanKodePos' => 'Perusahaan Kode Pos',
            'perusahaanProfil' => 'Perusahaan Profil',
            'perusahaanNamaOfficer' => 'Perusahaan Nama Officer',
            'perusahaanEmailOfficer' => 'Perusahaan Email Officer',
            'perusahaanTelfonOfficer' => 'Perusahaan Telfon Officer',
            'perusahanHpOfficer' => 'Perusahan Hp Officer',
            'perusahaanStatus' => 'Perusahaan Status',
        ];
    }
}
