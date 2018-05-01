<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_hasil_seleksi".
 *
 * @property int $hasilSeleksiID
 * @property int $hasilSeleksiSeleksiID
 * @property int $hasilSeleksiUserID
 * @property int $hasilSeleksiLamaranID
 * @property string $hasilSeleksiHasil
 * @property string $hasilSeleksiKeterangan
 * @property string $hasilSeleksiStatus
 */
class WebHasilSeleksi extends \yii\db\ActiveRecord
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
            [['hasilSeleksiSeleksiID', 'hasilSeleksiUserID', 'hasilSeleksiLamaranID'], 'integer'],
            [['hasilSeleksiHasil', 'hasilSeleksiKeterangan', 'hasilSeleksiStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hasilSeleksiID' => 'Hasil Seleksi ID',
            'hasilSeleksiSeleksiID' => 'Hasil Seleksi Seleksi ID',
            'hasilSeleksiUserID' => 'Hasil Seleksi User ID',
            'hasilSeleksiLamaranID' => 'Hasil Seleksi Lamaran ID',
            'hasilSeleksiHasil' => 'Hasil Seleksi Hasil',
            'hasilSeleksiKeterangan' => 'Hasil Seleksi Keterangan',
            'hasilSeleksiStatus' => 'Hasil Seleksi Status',
        ];
    }
}
