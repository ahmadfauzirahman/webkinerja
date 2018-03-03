<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_presentasi".
 *
 * @property int $presentasiID
 * @property int $presentasiEventsID
 * @property string $presentasiTglMulai
 * @property string $presentasiTglSelesai
 * @property int $presentasiPerusahaanID
 * @property string $webPresentasiStatus
 */
class WebPresentasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_presentasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentasiEventsID', 'presentasiPerusahaanID'], 'integer'],
            [['presentasiTglMulai', 'presentasiTglSelesai'], 'safe'],
            ['presentasiTglMulai', 'compare', 'compareAttribute' => 'presentasiTglSelesai', 'operator' => '<=', 'enableClientValidation' => false],
            [['webPresentasiStatus'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'presentasiID' => 'Presentasi ID',
            'presentasiEventsID' => 'Presentasi Events ID',
            'presentasiTglMulai' => 'Tanggal Mulai',
            'presentasiTglSelesai' => 'Tanggal Selesai',
            'presentasiPerusahaanID' => 'Nama Perusahaan',
            'webPresentasiStatus' => 'Status',
        ];
    }
}
