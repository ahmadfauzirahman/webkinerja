<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_jadwal_events".
 *
 * @property int $jadwalEventsID
 * @property int $jadwalEventsEventsID
 * @property string $jadwalEventsTglMulai
 * @property string $jadwalEventsTglSelesai
 * @property string $jadwalEventsNama
 * @property string $jadwalEventsStatus
 */
class WebJadwalEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_jadwal_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['jadwalEventsEventsID', 'integer', 'message' => 'Data harus berupa angka'],
            [['jadwalEventsTglMulai', 'jadwalEventsTglSelesai'], 'safe'],
            ['jadwalEventsTglMulai', 'compare', 'compareAttribute' => 'jadwalEventsTglSelesai', 'operator' => '<=', 'enableClientValidation' => false],
            [['jadwalEventsStatus'], 'string'],
            [['jadwalEventsNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jadwalEventsID' => 'Jadwal Events ID',
            'jadwalEventsEventsID' => 'Nama Event',
            'jadwalEventsTglMulai' => 'Tanggal Mulai',
            'jadwalEventsTglSelesai' => 'Tanggal Selesai',
            'jadwalEventsNama' => 'Nama Jadwal Event',
            'jadwalEventsStatus' => 'Status Jadwal',
        ];
    }
}
