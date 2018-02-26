<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_univ".
 *
 * @property int $univID
 * @property string $univNama
 * @property string $univStatus
 */
class WebUniv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_univ';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univNama'], 'required'],
            [['univNama'], 'unique','message' => 'Nama Universitas Sudah Tersedia'],
            [['univStatus'], 'string'],
            [['univNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'univID' => 'ID Universitas',
            'univNama' => 'Nama Universitas',
            'univStatus' => 'Status',
        ];
    }
}
