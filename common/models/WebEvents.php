<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_events".
 *
 * @property int $eventsID
 * @property string $eventsJudul
 * @property string $eventsTanggalMulai
 * @property string $eventsTanggalSelesai
 * @property string $eventsLokasi
 * @property string $eventsKeterangan
 * @property string $eventsThumbnails
 * @property string $eventsStatus
 */
class WebEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventsJudul', 'eventsLokasi', 'eventsKeterangan'], 'string'],
            [

                ['eventsThumbnails'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg' ,
            ],
            [['eventsTanggalMulai', 'eventsTanggalSelesai'], 'safe'],
            [['eventsStatus'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'eventsID' => 'Events ID',
            'eventsJudul' => 'Events Judul',
            'eventsTanggalMulai' => 'Events Tanggal Mulai',
            'eventsTanggalSelesai' => 'Events Tanggal Selesai',
            'eventsLokasi' => 'Events Lokasi',
            'eventsKeterangan' => 'Events Keterangan',
            'eventsThumbnails' => 'Events Thumbnails',
            'eventsStatus' => 'Events Status',
        ];
    }
}
