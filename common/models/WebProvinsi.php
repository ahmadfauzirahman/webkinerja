<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_provinsi".
 *
 * @property int $provinsiID
 * @property string $provinsiNama
 * @property string $provinsiStatus
 */
class WebProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provinsiNama', 'provinsiStatus'], 'required'],
            [['provinsiStatus'], 'string'],
            [['provinsiNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'provinsiID' => 'ID Provinsi',
            'provinsiNama' => 'Nama Provinsi',
            'provinsiStatus' => 'Status',
        ];
    }
}
