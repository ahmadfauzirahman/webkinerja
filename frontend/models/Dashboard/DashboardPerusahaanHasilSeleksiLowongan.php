<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "web_hasil_seleksi".
 *
 * @property int $hasilSeleksiID
 * @property int $hasilSeleksiUserID
 * @property int $hasilSeleksiLamaranID
 * @property string $hasilSeleksiHasil
 * @property string $hasilSeleksiKeterangan
 * @property string $hasilSeleksiStatus
 */
class DashboardPerusahaanHasilSeleksiLowongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_hasil_seleksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hasilSeleksiUserID', 'hasilSeleksiLamaranID', 'hasilSeleksiLowonganID'], 'integer'],
            [['hasilSeleksiHasil', 'hasilSeleksiKeterangan', 'hasilSeleksiStatus'], 'string'],
            [['hasilSeleksiLamaranID','hasilSeleksiStatus'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hasilSeleksiID' => 'ID',
            'hasilSeleksiUserID' => 'Pelamar',
            'hasilSeleksiLamaranID' => 'ID Lamaran',
            'hasilSeleksiLowonganID' => 'Lowongan',
            'hasilSeleksiHasil' => 'Hasil',
            'hasilSeleksiKeterangan' => 'Keterangan',
            'hasilSeleksiStatus' => 'Status Hasil',
        ];
    }
}
