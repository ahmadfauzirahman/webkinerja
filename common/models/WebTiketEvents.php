<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_tiket_events".
 *
 * @property int $tiketEventsID
 * @property int $tiketEventsEventsID
 * @property int $tiketEventsUserID
 * @property string $tiketEventsStatus
 */
class WebTiketEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_tiket_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiketEventsEventsID', 'tiketEventsUserID'], 'integer'],
            [['tiketEventsStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tiketEventsID' => 'Tiket Events ID',
            'tiketEventsEventsID' => 'Tiket Events Events ID',
            'tiketEventsUserID' => 'Nama User',
            'tiketEventsStatus' => 'Status',
        ];
    }
}
