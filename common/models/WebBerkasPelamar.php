<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_berkas_pelamar".
 *
 * @property int $berkasPelamarID
 * @property int $berkasPelamarUserID
 * @property string $berkasPelamarNama
 * @property string $berkasPelamarFile
 * @property string $berkasPelamarStatus
 */
class WebBerkasPelamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_berkas_pelamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['berkasPelamarUserID'], 'integer'],
            [['berkasPelamarNama', 'berkasPelamarFile', 'berkasPelamarStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'berkasPelamarID' => 'Berkas Pelamar ID',
            'berkasPelamarUserID' => 'Berkas Pelamar User ID',
            'berkasPelamarNama' => 'Berkas Pelamar Nama',
            'berkasPelamarFile' => 'Berkas Pelamar File',
            'berkasPelamarStatus' => 'Berkas Pelamar Status',
        ];
    }
}
