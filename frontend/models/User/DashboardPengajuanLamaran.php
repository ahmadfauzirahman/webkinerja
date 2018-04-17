<?php

namespace frontend\models\User;

use Yii;

/**
 * This is the model class for table "web_lamaran".
 *
 * @property int $lamaranID
 * @property int $lamaranUserID
 * @property int $lamaranLowonganID
 * @property string $lamaranPermohonan
 * @property string $lamaranTglMelamar
 * @property string $lamaranKeteranganLamaran
 * @property string $lamaranStatus
 */
class DashboardPengajuanLamaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_lamaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lamaranUserID', 'lamaranLowonganID'], 'integer'],
            [['lamaranPermohonan', 'lamaranKeteranganLamaran', 'lamaranStatus'], 'string'],
            [['lamaranTglMelamar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lamaranID' => 'ID Pengajuan Lamaran',
            'lamaranUserID' => 'User ID',
            'lamaranLowonganID' => 'Lowongan',
            'lamaranPermohonan' => 'Permohonan',
            'lamaranTglMelamar' => 'Tgl. Pengajuan',
            'lamaranKeteranganLamaran' => 'Keterangan',
            'lamaranStatus' => 'Status Review',
        ];
    }
}
