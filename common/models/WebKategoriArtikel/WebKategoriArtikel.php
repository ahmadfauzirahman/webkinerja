<?php

namespace common\models\WebKategoriArtikel;

use Yii;

/**
 * This is the model class for table "web_kategori_artikel".
 *
 * @property int $kategoriArtikelID
 * @property string $kategoriArtikelNama
 * @property string $kategoriArtikelStatus
 */
class WebKategoriArtikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_kategori_artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategoriArtikelNama', 'kategoriArtikelStatus'], 'string'],
            [['kategoriArtikelNama', 'kategoriArtikelStatus'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategoriArtikelID' => 'Kategori Artikel ID',
            'kategoriArtikelNama' => 'Kategori Artikel Nama',
            'kategoriArtikelStatus' => 'Kategori Artikel Status',
        ];
    }
}
