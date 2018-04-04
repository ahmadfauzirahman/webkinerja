<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "web_user_premium_transaksi".
 *
 * @property int $userPremiumTransaksiID
 * @property int $userPremiumID
 * @property int $userID
 * @property string $userPremiumTransaksiNama
 * @property string $userPremiumTransaksiNoRek
 * @property string $userPremiumTransaksiTglTransaksi
 * @property string $userPremiumTransaksiTglKonfirmasi
 * @property string $userPremiumTransaksiNominal
 * @property string $userPremiumTransaksiBukti
 * @property string $userPremiumTransaksiKeterangan
 * @property string $userPremiumTransaksiStatus
 */
class DashboardUserPremiumTransaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_user_premium_transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userPremiumID', 'userID', 'userPremiumTransaksiNama', 'userPremiumTransaksiNoRek', 'userPremiumTransaksiTglTransaksi', 'userPremiumTransaksiNominal'], 'required', 'message' => 'Field ini tidak boleh kosong'],
            [['userPremiumID', 'userID'], 'integer'],
            [
                ['userPremiumTransaksiBukti'] ,
                'file' ,
                'skipOnEmpty' => TRUE,
                'extensions'  => 'png, jpg, jpeg' ,
            ],
            [['userPremiumTransaksiNama', 'userPremiumTransaksiNoRek', 'userPremiumTransaksiNominal', 'userPremiumTransaksiKeterangan', 'userPremiumTransaksiStatus'], 'string'],
            [['userPremiumTransaksiTglTransaksi', 'userPremiumTransaksiTglKonfirmasi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userPremiumTransaksiID' => '#ID Transaksi',
            'userPremiumID' => 'User Premium ID',
            'userID' => 'User ID',
            'userPremiumTransaksiNama' => 'Nama',
            'userPremiumTransaksiNoRek' => 'No.Rek',
            'userPremiumTransaksiTglTransaksi' => 'Tgl.Transaksi',
            'userPremiumTransaksiTglKonfirmasi' => 'Tgl.Konfirmasi',
            'userPremiumTransaksiNominal' => 'Jumlah Transfer',
            'userPremiumTransaksiBukti' => 'Bukti Transaksi',
            'userPremiumTransaksiKeterangan' => 'Keterangan',
            'userPremiumTransaksiStatus' => 'Status',
        ];
    }
}
