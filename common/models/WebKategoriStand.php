<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_kategori_stand".
 *
 * @property int $kategoriStandID
 * @property string $kategoriStandNama
 * @property string $kategoriStandFasilitas
 * @property int $kategoriStandHarga
 * @property string $kategoriStandStatus
 */
class WebKategoriStand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_kategori_stand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriStandFasilitas'], 'string'],
            [['kategoriStandHarga'], 'integer'],
            [['kategoriStandNama'], 'string', 'max' => 50],
            [['kategoriStandStatus'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategoriStandID' => 'ID Kategori Stand',
            'kategoriStandNama' => 'Nama Kategori',
            'kategoriStandFasilitas' => 'Fasilitas',
            'kategoriStandHarga' => 'Harga',
            'kategoriStandStatus' => 'Status',
        ];
    }
}
