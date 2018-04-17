<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_kategori_seleksi".
 *
 * @property int $kategoriSeleksiID
 * @property string $kategoriSeleksiNama
 * @property string $kategoriSeleksiStatus
 */
class WebKategoriSeleksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_kategori_seleksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriSeleksiNama', 'kategoriSeleksiStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategoriSeleksiID' => 'Kategori Seleksi ID',
            'kategoriSeleksiNama' => 'Kategori Seleksi Nama',
            'kategoriSeleksiStatus' => 'Kategori Seleksi Status',
        ];
    }
}
