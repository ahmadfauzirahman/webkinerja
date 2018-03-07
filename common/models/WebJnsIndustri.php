<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_jns_industri".
 *
 * @property int $jnsIndustriID
 * @property string $jnsIndustriNama
 * @property string $jnsIndustriStatus
 */
class WebJnsIndustri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_jns_industri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jnsIndustriNama'], 'string', 'max' => 200],
            [['jnsIndustriStatus'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jnsIndustriID' => 'ID Jenis Industri',
            'jnsIndustriNama' => 'Jenis Industri',
            'jnsIndustriStatus' => 'Status',
        ];
    }
}
