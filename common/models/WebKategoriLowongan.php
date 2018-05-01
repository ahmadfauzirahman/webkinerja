<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_kategori_lowongan".
 *
 * @property int $kategoriLowonganID
 * @property string $kategoriLowonganNama
 * @property string $kategoriLowonganStatus
 */
class WebKategoriLowongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_kategori_lowongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriLowonganNama', 'kategoriLowonganStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategoriLowonganID' => 'Kategori Lowongan ID',
            'kategoriLowonganNama' => 'Kategori Lowongan Nama',
            'kategoriLowonganStatus' => 'Kategori Lowongan Status',
        ];
    }
}
