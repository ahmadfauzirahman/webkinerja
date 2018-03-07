<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_venue".
 *
 * @property int $venueID
 * @property string $venueNama
 * @property string $venueStatus
 */
class WebVenue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_venue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venueNama'], 'string', 'max' => 100],
            [['venueStatus'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'venueID' => 'Venue ID',
            'venueNama' => 'Nama Venue',
            'venueStatus' => 'Status',
        ];
    }
}
