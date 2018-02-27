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
            [['artikelJudul'], 'required'],
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
            'artikelID' => 'Artikel ID',
            'artikelKategoriID' => 'Artikel Kategori ID',
            'artikelUserID' => 'Artikel User ID',
            'artikelJudul' => 'Artikel Judul',
            'artikelIsi' => 'Artikel Isi',
            'artikelThumbnails' => 'Artikel Thumbnails',
            'artikelTglPost' => 'Artikel Tgl Post',
            'artikeReader' => 'Artike Reader',
            'artikelStatus' => 'Artikel Status',
        ];
    }
}
