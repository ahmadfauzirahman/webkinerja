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
                'extensions'  => 'png, jpg, jpeg' ,
            ],
            [['eventsTanggalMulai', 'eventsTanggalSelesai'], 'date', 'format' => 'yyyy-mm-dd'],
            ['eventsTanggalMulai', 'compare', 'compareAttribute' => 'eventsTanggalSelesai', 'operator' => '<=','enableClientValidation' => false],
            [['eventsStatus'], 'string', 'max' => 50],
            [['eventsThumbnails'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'eventsID' => 'Events ID',
            'eventsJudul' => 'Judul Event',
            'eventsTanggalMulai' => 'Tanggal Mulai',
            'eventsTanggalSelesai' => 'Tanggal Selesai',
            'eventsLokasi' => 'Lokasi Event',
            'eventsKeterangan' => 'Keterangan Lainnya',
            'eventsThumbnails' => 'Thumbnails',
            'eventsStatus' => 'Status Event',
        ];
    }
}
