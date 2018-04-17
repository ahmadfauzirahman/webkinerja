<?php

namespace common\models;

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
class WebUserPremiumTransaksi extends \yii\db\ActiveRecord
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
            [['userPremiumID', 'userID'], 'required'],
            [['userPremiumID', 'userID'], 'integer'],
            [['userPremiumTransaksiNama', 'userPremiumTransaksiNoRek', 'userPremiumTransaksiNominal', 'userPremiumTransaksiBukti', 'userPremiumTransaksiKeterangan', 'userPremiumTransaksiStatus'], 'string'],
            [['userPremiumTransaksiTglTransaksi', 'userPremiumTransaksiTglKonfirmasi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userPremiumTransaksiID' => 'User Premium Transaksi ID',
            'userPremiumID' => 'User Premium ID',
            'userID' => 'User ID',
            'userPremiumTransaksiNama' => 'User Premium Transaksi Nama',
            'userPremiumTransaksiNoRek' => 'User Premium Transaksi No Rek',
            'userPremiumTransaksiTglTransaksi' => 'User Premium Transaksi Tgl Transaksi',
            'userPremiumTransaksiTglKonfirmasi' => 'User Premium Transaksi Tgl Konfirmasi',
            'userPremiumTransaksiNominal' => 'User Premium Transaksi Nominal',
            'userPremiumTransaksiBukti' => 'User Premium Transaksi Bukti',
            'userPremiumTransaksiKeterangan' => 'User Premium Transaksi Keterangan',
            'userPremiumTransaksiStatus' => 'User Premium Transaksi Status',
        ];
    }
}
