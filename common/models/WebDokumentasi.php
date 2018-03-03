<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_dokumentasi".
 *
 * @property int $dokumentasiID
 * @property int $dokumentasiEventsID
 * @property string $DokumentasiFoto
 */
class WebDokumentasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_dokumentasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dokumentasiEventsID'], 'integer'],
            [['DokumentasiFoto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jgp, png', 'maxFiles' => '8'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dokumentasiID' => 'Dokumentasi ID',
            'dokumentasiEventsID' => 'Nama Event',
            'DokumentasiFoto' => 'Foto Dokumentasi',
        ];
    }
}
