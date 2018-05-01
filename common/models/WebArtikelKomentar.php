<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_artikel_komentar".
 *
 * @property int $artikelKomentarID
 * @property int $artikelKomentarArtikelID
 * @property string $artikelKomentarEmail
 * @property string $artikelKomentarNama
 * @property string $artikelKomentarIsi
 * @property string $artikelKomentarTglPost
 * @property string $artikelKomentarStatus
 */
class WebArtikelKomentar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_artikel_komentar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artikelKomentarArtikelID'], 'integer'],
            [['artikelKomentarEmail', 'artikelKomentarNama', 'artikelKomentarIsi', 'artikelKomentarStatus'], 'string'],
            [['artikelKomentarTglPost'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'artikelKomentarID' => 'Artikel Komentar ID',
            'artikelKomentarArtikelID' => 'Artikel Komentar Artikel ID',
            'artikelKomentarEmail' => 'Artikel Komentar Email',
            'artikelKomentarNama' => 'Artikel Komentar Nama',
            'artikelKomentarIsi' => 'Artikel Komentar Isi',
            'artikelKomentarTglPost' => 'Artikel Komentar Tgl Post',
            'artikelKomentarStatus' => 'Artikel Komentar Status',
        ];
    }
}
