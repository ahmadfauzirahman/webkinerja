<?php

namespace common\models\WebArtikel;

use Yii;

/**
 * This is the model class for table "web_artikel".
 *
 * @property int $artikelID
 * @property int $artikelKategoriID
 * @property int $artikelUserID
 * @property string $artikelJudul
 * @property string $artikelIsi
 * @property string $artikelThumbnails
 * @property string $artikelTglPost
 * @property string $artikeReader
 * @property string $artikelStatus
 */
class WebArtikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artikelKategoriID', 'artikelUserID'], 'integer'],
            [['artikelJudul', 'artikelIsi', 'artikelStatus'], 'string'],
            [

                ['artikelThumbnails'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg, jpeg' ,
            ],
            [['artikelJudul','artikelKategoriID'], 'required', 'message' => 'Field ini tidak boleh kosong'],
            [['artikelTglPost'], 'safe'],
            [['artikeReader'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'artikelID' => 'ID Artikel',
            'artikelKategoriID' => 'Kategori',
            'artikelUserID' => 'User ID',
            'artikelJudul' => 'Judul Artikel',
            'artikelIsi' => 'Konten Artikel',
            'artikelThumbnails' => 'Artikel Thumbnails',
            'artikelTglPost' => 'Tanggal Post',
            'artikeReader' => 'Artike Reader',
            'artikelStatus' => 'Status Artikel',
        ];
    }
}
